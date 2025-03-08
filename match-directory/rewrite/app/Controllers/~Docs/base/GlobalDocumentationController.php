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
        $lang = Request::param('lang')->asString();

        $this->title = $title;

        $this->description = $desc;

        $this->showcaseCenterHtml = '<a href="/"><h2>PHP Framework HLEB2</h2></a>';

        $this->showcaseRightHtml = \template('/docs/right.block');

        $this->cssResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/css/main";

        $this->jsResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/js/main";

        $this->logoUri = $this->request()->getHost() === 'hleb2framework.ru' ? '/docs/images/mcode.png' : null;

        $path = explode('/', trim(Request::getUri()->getPath(), '/'));
        array_shift($path);
        $version = (int)array_shift($path);
        $subversion = (int)array_shift($path);

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
        return '';
    }
}
