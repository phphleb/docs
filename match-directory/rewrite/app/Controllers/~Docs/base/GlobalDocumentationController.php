<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Base\PageController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Path;
use Hleb\Static\Request;
use Phphleb\Docs\Config;

class GlobalDocumentationController extends PageController
{
    public function content(string $page, string $title, string $desc): View
    {
        $lang = strtolower(Request::param('lang')->asString());

        $this->title = $title;

        $this->description = $desc;

        $this->showcaseCenterHtml = '<a href="/"><h2>PHP Framework HLEB2</h2></a>';

        $this->cssResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/css/main";

        $this->jsResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/js/main";

        $this->logoUri = $this->request()->getHost() === 'hleb2framework.ru' ? '/docs/images/mcode.png' : null;

        $path = explode('/', trim(Request::getUri()->getPath(), '/'));
        array_shift($path);
        $version = (int)array_shift($path);
        $subversion = (int)array_shift($path);
        $endPath = implode('/', $path);
        $this->showcaseRightHtml = \template('/docs/right.block', ['versions' => $this->getVersions($lang, $endPath, $version, $subversion, $page)]);

        $this->metaRows = [
            '<!--Icons-->',
            '<link rel="apple-touch-icon" sizes="128x128" href="https://' . Request::getHost() . '/docs/touch-icon/apple-touch-icon.png">',
            '<link rel="mask-icon" href="/docs/touch-icon/safari-pinned-tab.svg" color="#4c7ab5">',
            '<meta name="msapplication-TileColor" content="#603cba">',
            '<link rel="icon" type="image/png" sizes="32x32" href="/docs/touch-icon/favicon-32x32.png">',
            '<link rel="icon" type="image/png" sizes="16x16" href="/docs/touch-icon/favicon-16x16.png">',
            '<meta name="msapplication-config" content="/docs/touch-icon/browserconfig.xml">',
            '<meta name="theme-color" content="#ea1f61">',
            '<link rel="manifest" href="/docs/touch-icon/site.webmanifest">',
            '<!-- -->'
        ];

        return view('/docs/distributor', [
            'template' => $this->searchTemplateVersion($lang, $version, $subversion, $page),
            'params' => [],
            'sec' => Config::CACHE_PAGE_SEC,
        ]);
    }

    private function searchTemplateVersion(string $lang, int $version, int $subversion, string $page): string
    {
        if ($version < 2) {
            hl_redirect('404', 404);
        }
        for ($v = $version; $v >= 2; $v--) {
            for ($s = $subversion; $s >= 0; $s--) {
                $tmpl = Path::getReal("@views/docs/$lang/$version/$subversion/$page.php");
                if ($tmpl) {
                    return "/docs/$lang/$version/$subversion/$page";
                }
            }
        }
        hl_redirect('404', 404);
    }

    public function getVersions(string $lang, string $endPath, int $version, int $subversion, string $page): array
    {
        $dir = Path::getReal("@views/docs/$lang/");
        $result = [];

        if (!is_dir($dir)) {
            return $result;
        }

        $levelOneDirs = array_filter(
            glob($dir . '*', GLOB_ONLYDIR),
            function($path) { return is_dir($path); }
        );

        $versions = [];

        foreach ($levelOneDirs as $lvlOnePath) {
            $lvlOne = (int)basename($lvlOnePath);

            $levelTwoDirs = array_filter(
                glob($lvlOnePath . '/*', GLOB_ONLYDIR),
                function($path) { return is_dir($path); }
            );
            $current = [];
            foreach ($levelTwoDirs as $lvlTwoPath) {
                $lvlTwo = (int)basename($lvlTwoPath);
                if ($lvlOne === $version && $lvlTwo === $subversion) {
                    $current[] = [$lvlOne, $lvlTwo];
                } else {
                    if (Path::getReal("@views/docs/$lang/$lvlOne/$lvlTwo/$page.php")) {
                        $versions[] = [$lvlOne, $lvlTwo];
                    }
                }
            }
            if ($versions) {
                usort($versions, function ($a, $b) {
                    if ($a[0] == $b[0]) {
                        return $b[1] <=> $a[1];
                    }
                    return $b[0] <=> $a[0];
                });
            }
            $versions = array_merge($current, $versions);
            foreach ($versions as $data) {
                $version = "{$data[0]}.{$data[1]}";
                $url = "/{$lang}/{$data[0]}/{$data[1]}/{$endPath}";

                $result[$version] = $url;
            }
        }

        return $result;
    }

}
