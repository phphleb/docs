<?php

declare(strict_types=1);

namespace Phphleb\Docs\Src;

use Hleb\Static\Path;

class Code
{
    private const COMMENT = "hl-comment";

    private const DEFAULT = "hl-default";

    private const HTML = "hl-html";

    private const KEYWORD = "hl-keyword";

    private const STRING = "hl-string";

    private const VARIABLE = "hl-variable";

    private static $init = false;

    public static function fromFile(string $path, bool $phpTag = true): string
    {
        self::init();
        if (str_starts_with($path, '@')) {
            $path = Path::getReal($path);
        }
        $code = file_get_contents($path);

        return self::update($code, $phpTag);
    }

    public static function fromStr(string $code): string
    {
        self::init();

        return self::update($code, true);
    }

    private static function init(): void
    {
        if (self::$init) return;
        ini_set("highlight.comment", self::COMMENT);
        ini_set("highlight.default", self::DEFAULT);
        ini_set("highlight.html", self::HTML);
        ini_set("highlight.keyword", self::KEYWORD);
        ini_set("highlight.string", self::STRING);
        self::$init = true;
    }

    private static function update(string $text, bool $phpTag): string
    {
        $text = self::findAndRemoveAttention($text);
        if (!$phpTag) {
            $text = trim((string)str_replace('<?php', '', $text));
            if (str_starts_with(ltrim($text), '?>')) {
                $text = ltrim($text, '?>');
            }
        }
        $text = trim(str_replace(["<code>", "</code>"], "", highlight_string("<?php " . $text, true)));
        $pre = str_contains($text, '<pre>');
        if ($pre) {
            $text = (string)preg_replace('~&lt;\?php ~', '', $text, 1);
        }
        if ($phpTag) {
            if ($pre) {
                $text = (string)preg_replace('~\n~', '', $text, 1);
            } else {
                $text = (string)preg_replace('~<br \/>~', '', $text, 1);
            }
        }
        $classes = [self::COMMENT, self::DEFAULT, self::KEYWORD, self::STRING, self::HTML];
        foreach ($classes as $class) {
            $text = str_replace('<span style="color: ' . $class . '">', '<span class="' . $class . '">', $text);
            $text = str_replace('<code style="color: ' . $class . '">', '<span class="' . $class . '">', $text);
        }
        $text = self::highlightVariables($text);
        $text = self::highlightAnnotation($text);
        $text = preg_replace("~\&lt\;\?php\&nbsp\;~", '', $text, 1);
        $text = str_replace('<br />', '<br>' . PHP_EOL, $text);
        $text = self::wrapTextWithNowrap($text, $pre ? '\n' : '\<br\>');

        return '<div class="hl-code notranslate">' . $text . '</div>';
    }

    private static function highlightVariables($code): string
    {
        $pattern = '/(\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';
        return (string)preg_replace($pattern, '<span class="' . self::VARIABLE . '">$1</span>', $code);
    }

    private static function findAndRemoveAttention(string $str): string
    {
        return preg_replace('/\/\*.*?ATTENTION.*?\*\/\n/s', '', $str);
    }

    private static function highlightAnnotation(string $str): string
    {
        $result = preg_replace_callback(
            '/#\[(.*?)\]/s',
            function ($matches) {
                $cleanContent = preg_replace('/<.*?>/', '', $matches[1]);
                return '<span class="hl-annotation">#[' . $cleanContent . ']</span>';
            },
            $str
        );
        return $result;
    }

    private static function wrapTextWithNowrap(string $text, string $pattern): string
    {
        $lines = explode($pattern, $text);
        foreach ($lines as $key => $line) {
            $lines[$key] = '<span class="hl-nowrap">' . $line . '</span>';
        }
        return implode('<br>', $lines);
    }
}