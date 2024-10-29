<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class RouteController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Routing';
        $desc = 'Routing in the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Маршрутизация';
            $desc = 'Роутинг фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：路由';
            $desc = 'HLEB 框架中的路由';
        }

        return $this->content('routes.page', $title, $desc);
    }
}
