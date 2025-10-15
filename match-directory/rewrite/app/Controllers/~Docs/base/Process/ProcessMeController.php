<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Process;

use FilesystemIterator;
use Hleb\Base\Controller;
use Hleb\Http400BadRequestException;
use Hleb\Static\Cache;
use Hleb\Static\Path;
use Hleb\Static\Response;
use Phphleb\Docs\Src\Code;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class ProcessMeController extends Controller
{
    private const HIDDEN_FILES = [
        'title.page.php'
    ];

    public function index(int $version, int $subversion): string
    {
        return Cache::getConform(__METHOD__, fn() => $this->generate($version, $subversion), 31556925);
    }

    private function generate(int $version, int $subversion): string
    {
        $result = '';

        $dir = Path::getReal("@views/docs/en/$version/$subversion/");
        if (!$dir) {
            throw new Http400BadRequestException('Directory not found');
        }
        $codeDir = Path::getReal("@views/docs/code");
        if (!$codeDir) {
            throw new Http400BadRequestException('Directory not found');
        }
        $codeFiles = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($codeDir, FilesystemIterator::SKIP_DOTS)
        );
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
        );
        /** @var SplFileInfo $item */
        foreach ($files as $item) {
            if (in_array($item->getFilename(), self::HIDDEN_FILES)) {
                continue;
            }
            $path = $item->getRealPath();
            if ($item->isFile() && $item->getExtension() === 'php' && str_ends_with($path, '.page.php')) {
                $result .= $this->prepareFile($path) . '-------------------------' . PHP_EOL;
            }
        }
        Response::setHeader('Content-Type', 'text/plain; charset=utf-8');


        return $result;
    }

    private function prepareFile(string $path): string
    {
        $content = file_get_contents($path);
        if (!$content) {
            return '';
        }

        $rows = explode("\n", $content);

        foreach($rows as &$row) {
             if (str_contains($row, 'Paragraph::h1')) {
                $row = $this->prepareH1($row);
                continue;
            }
            if (str_contains($row, 'Paragraph::h')) {
                $row = $this->prepareH($row);
                continue;
            }
            if (str_contains($row, 'Code::fromFile')) {
                $row = $this->prepareCode($row);
                continue;
            }
        }

        $text = implode(PHP_EOL, $rows);
        $text = $this->transformBashBlocks($text);
        $text = $this->replaceSpacesInPreBlocks($text);

        $text = preg_replace('/<\?(?:php)?[\s\S]*?\?>/', '', $text);
        $text = strip_tags($text);
        $text = preg_replace('/( {2,}|\t{2,})/', '', $text);
        $text = preg_replace('/(\r\n|\r|\n){2,}/', PHP_EOL, $text);
        $text = str_replace(['&#9724;', '&nbsp;', '&#9724;', '&vdash;'], ' ', $text);
        $text = html_entity_decode($text);
        $text = str_replace('<?php?>', '', $text);

        return $text . PHP_EOL;
    }

    private function prepareH1(string $text): string
    {
        if (preg_match("/Paragraph::h1\('(.+?)'\)/s", $text, $matches)) {
            $content = $matches[1];
            return PHP_EOL . '# ' . $content . PHP_EOL;
        }
        return $text;
    }

    private function prepareH(string $text): string
    {
        if (preg_match("/Paragraph::h([1-6])\('(.+?)'\)/s", $text, $matches)) {
            $level = (int)$matches[1];
            $content = $matches[2];
            return PHP_EOL . str_repeat('#', $level) . ' ' . $content . PHP_EOL;
        }
        return $text;
    }

    private function prepareCode(string $text): string
    {
        if (preg_match("/Code::fromFile\((.*?)\);/", $text, $matches)) {
            $params = explode(',', $matches[1]);
            $secondParam = true;
            if (isset($params[1])) {
                $secondParam = trim($params[1])  === 'true';
            }
            $firstParam = trim($params[0], '\'" ');
            $code = Code::fromFile($firstParam, $secondParam);
            return PHP_EOL . '```' . PHP_EOL . $code  . PHP_EOL . '```' . PHP_EOL;
        }
        return $text;
    }

    function transformBashBlocks(string $input): string
    {
        return preg_replace_callback(
            '#<p class="hl-bash-block">(.*?)</p>#s',
            function ($matches) {
                $inner = $matches[1];
                $text = strip_tags($inner);
                $text = preg_replace('/^\$/', '$ ', $text);
                return "```" . $text . "```";
            },
            $input
        );
    }

    function replaceSpacesInPreBlocks(string $input): string {
        return preg_replace_callback(
            '#<pre class="hl-text-block notranslate">(.*?)</pre>#si',
            function($matches) {
                $content = str_replace(' ', '&nbsp;', $matches[1]);
                return '```<pre class="hl-text-block notranslate">' . $content . '</pre>```' . PHP_EOL . ' ';
            },
            $input
        );
    }

}
