<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class SwooleServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Running with Swoole';
        $desc = 'Guide for running the HLEB framework using Swoole.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Запуск при помощи Swoole';
            $desc = 'Инструкция по запуску фреймворка HLEB c использованием Swoole.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：使用 Swoole 运行';
            $desc = '使用 Swoole 运行 HLEB 框架的指南。';
        }

        return $this->content('start/start.swoole.page', $title, $desc);
    }
}
