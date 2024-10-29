<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TwigTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: TWIG Templates';
        $desc = 'HLEB framework guide - TWIG templates.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Шаблоны TWIG';
            $desc = 'Инструкция фреймворка HLEB - шаблоны TWIG.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：TWIG模板';
            $desc = 'HLEB 框架指南 - TWIG 模板。';
        }

        return $this->content('templates/template.twig.page', $title, $desc);
    }
}
