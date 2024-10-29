<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class StandardTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Standard Templates';
        $desc = 'HLEB framework guide - standard templates.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Стандартные шаблоны';
            $desc = 'Инструкция фреймворка HLEB - стандартные шаблоны.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：标准模板';
            $desc = 'HLEB 框架指南 - 标准模板。';
        }

        return $this->content('templates/template.standard.page', $title, $desc);
    }
}
