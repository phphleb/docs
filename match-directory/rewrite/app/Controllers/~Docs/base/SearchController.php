<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Phphleb\Docs\Config;

class SearchController  extends GlobalDocumentationController
{
    public function index(): View
    {
        $this->jsResources[] = "/hlresource/docs/v" . Config::API_VERSION . "/js/search";

        return $this->content(
            'search.page',
            'Поиск по документации',
            'Поиск по документации фреймворка HLEB.',
        );
    }
}
