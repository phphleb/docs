<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class FrankenPhpController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Running with FrankenPHP';
        $desc = 'Guide for running the HLEB framework using FrankenPHP.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Запуск при помощи FrankenPHP';
            $desc = 'Инструкция по запуску фреймворка HLEB при помощи FrankenPHP.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：使用 FrankenPHP 运行';
            $desc = '使用 FrankenPHP 运行 HLEB 框架的指南。';
        }

        return $this->content('start/start.frankenphp.page', $title, $desc);
    }
}
