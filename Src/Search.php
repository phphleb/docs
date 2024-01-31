<?php

declare(strict_types=1);

namespace Phphleb\Docs\Src;

use FilesystemIterator;
use Hleb\Static\Path;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Search the text of files to create an array with data of found matches.
 *
 * Поиск по тексту файлов для создания массива с данными найденных совпадений.
 */
class Search
{
    private const CAPTURE = 100;

    public static function get(
        string $text,
        string $lang,
        int $version,
        int $subversion,
        int $max = 10,
    ): array
    {
        $dir = Path::getReal("@views/docs/$lang/$version/$subversion/");
        if (!$dir) {
            return [];
        }
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
        );
        $result = [];
        $count = 0;
        $prefix = "docs.$version.$subversion";
        /** @var SplFileInfo $item */
        foreach ($files as $item) {
            $path = $item->getRealPath();
            if ($item->isFile() && $item->getExtension() === 'php' && str_ends_with($path, '.page.php')) {
                $search = self::searchForMatch($path, $text);
                if ($search) {
                    $result[self::searchUrlInFileName($item->getFilename(), $prefix, $lang)] = $search;
                    $count += count($search);
                }
                if ($count >= $max) {
                    return $result;
                }
            }
        }
        return $result;
    }

    /**
     * Finding matches in a file.
     *
     * Поиск совпадений в файле.
     */
    private static function searchForMatch(string $file, string $phrase): array
    {
        $content = file_get_contents($file);
        if (!$content) {
            return [];
        }
        $matches = self::explodeByTag($content, $phrase);
        if (!$matches) {
            return [];
        }
        return $matches;
    }

    /**
     * Splitting text using HTML anchors.
     *
     * Разбитие текста по HTML-якорям.
     */
    private static function explodeByTag(string $text, string $phrase): array
    {
        $result = [];
        $lowerPhrase = mb_strtolower($phrase);
        $array = explode('Paragraph::h', $text);
        foreach ($array as $part) {
            if ($part[1] ?? null === '(' && in_array($part[0] ?? null, [1, 2, 3])) {
                $title = self::getTextBetweenQuotes($part);
                if (isset($result[$title])) {
                    continue;
                }
                $part = self::removeOutsideTags($part);
                $part = preg_replace('/<.*?>/', '', $part);
                $part = preg_replace('/<.*?>/', '', $part);
                $part = str_replace(['">', '<', '>', '\'>'], '', $part);
                if (str_contains(mb_strtolower($part), $lowerPhrase)) {
                    $result[$title] = [self::createAnchor($title), self::extractSurroundingText($part, $phrase)];
                }
            }
        }
        return $result;
    }

    /**
     * Selecting text of a certain length when there is a match.
     *
     * Выборка текста определённой длины при совпадении.
     */
    private static function extractSurroundingText($text, $phrase): string
    {
        $position = mb_strpos($text, $phrase);
        if ($position !== false) {
            $left = mb_substr($text, max($position - self::CAPTURE, 0), $position - max($position - self::CAPTURE, 0));
            $right = mb_substr($text, $position + mb_strlen($phrase), self::CAPTURE);
            $surroundedPhrase = "<b>" . $phrase . "</b>";
            return '... ' . trim(self::removeTextBeforeFirstSpace($left . $surroundedPhrase . $right), '<>') . ' ...';
        }
        return mb_strimwidth(trim($text, '<>'), 0, self::CAPTURE * 2) . ' ...';
    }

    /**
     * Returns the first occurrence between quotes.
     *
     * Возвращает первое вхождение между кавычек.
     */
    private static function getTextBetweenQuotes($text): ?string
    {
        preg_match("/['\"](.*?)['\"]/s", $text, $matches);

        return $matches[1] ?? null;
    }

    /**
     * Removes text at the beginning and/or end if the tags are not closed.
     *
     * Удаляет текст в начале и/или в конце, если теги не закрыты.
     */
    private static function removeOutsideTags($text)
    {
        $startPos = strpos($text, '>');
        if ($startPos !== false) {
            $text = substr($text, $startPos + 1);
        }

        $endPos = strrpos($text, '<');
        if ($endPos !== false) {
            $text = substr($text, 0, $endPos);
        }

        return $text;
    }

    /**
     * Removes text up to the first space encountered on the left and right.
     *
     * Удаляет текст до первого встретившегося пробела слева и справа.
     */
    private static function removeTextBeforeFirstSpace(string $text): string
    {
        $position = strpos($text, ' ');
        if ($position !== false) {
            $text = substr($text, $position + 1);
        }

        $position = strrpos($text, ' ');
        if ($position !== false) {
            $text = substr($text, 0, $position);
        }
        return $text;
    }

    /**
     * Determining the route using the file name (must converge).
     *
     * Определение маршрута через название файла (должны сходиться).
     */
    private static function searchUrlInFileName(string $fileName, string $prefix, string $lang): false|string
    {
      $searchRoute = $prefix . '.' . str_replace('.php', '', $fileName);
      try {
          $url = url($searchRoute, ['lang' => $lang]);
      } catch (\Throwable) {
          return false;
      }
      return $url;
    }

    /**
     * Creates a pointer to the HTML tag for the title.
     *
     * Создаёт указатель на HTML-метку для заголовка.
     */
    private static function createAnchor(string $title): string
    {
        return Paragraph::getHash($title);
    }
}