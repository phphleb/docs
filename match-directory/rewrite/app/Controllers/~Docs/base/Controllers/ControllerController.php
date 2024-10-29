<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ControllerController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Controller';
        $desc = 'HLEB framework guide - Controller.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Контроллер';
            $desc = 'Инструкция фреймворка HLEB - Контроллер.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：控制器';
            $desc = 'HLEB 框架指南 - 控制器。';
        }

        return $this->content('controllers/controller.controller.page', $title, $desc);

    }
}
