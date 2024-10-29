<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class IntroductionController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Introduction to development';
        $desc = 'Guide to using the HLEB framework. Introduction';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Введение в разработку';
            $desc = 'Инструкция по использованию фреймворка HLEB. Введение';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：开发介绍';
            $desc = '使用 HLEB 框架的指南。介绍';
        }

        return $this->content('introduction.page', $title, $desc);
    }
}
