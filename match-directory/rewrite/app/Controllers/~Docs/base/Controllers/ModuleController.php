<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ModuleController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Module';
        $desc = 'HLEB framework guide - Module.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Модуль';
            $desc = 'Инструкция фреймворка HLEB - Модуль.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：模块';
            $desc = 'HLEB 框架指南 - 模块。';
        }

        return $this->content('controllers/controller.module.page', $title, $desc);
    }
}
