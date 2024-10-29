<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;
use Phphleb\Docs\Config;

class SearchController  extends GlobalDocumentationController
{
    public function index(): View
    {
        $this->jsResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/js/search";

        $lang = Request::param('lang')->toString();

        $title = 'Search Documentation';
        $desc = 'Search the HLEB framework documentation.';

        if ($lang === 'ru') {
            $title = 'Поиск по документации';
            $desc = 'Поиск по документации фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = '搜索文档';
            $desc = '搜索 HLEB 框架文档。';
        }

        return $this->content('search.page', $title, $desc);
    }
}
