<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class CachedTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Cached Templates';
        $desc = 'HLEB framework guide - cached templates.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Кешируемые шаблоны';
            $desc = 'Инструкция фреймворка HLEB - кешируемые шаблоны.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：缓存模板';
            $desc = 'HLEB 框架指南 - 缓存模板。';
        }

        return $this->content('templates/template.cached.page', $title, $desc);
    }
}
