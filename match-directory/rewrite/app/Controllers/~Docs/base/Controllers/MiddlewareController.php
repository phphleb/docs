<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class MiddlewareController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Middleware Controller';
        $desc = 'HLEB framework guide - Middleware.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Контроллер-посредник Middleware';
            $desc = 'Инструкция фреймворка HLEB - Middleware.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：中间件控制器';
            $desc = 'HLEB 框架指南 - 中间件。';
        }

        return $this->content('controllers/controller.middleware.page', $title, $desc);
    }
}
