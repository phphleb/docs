<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class PhpServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Running on Built-in PHP Server';
        $desc = 'Guide for running the HLEB framework on the built-in PHP server.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Запуск на встроенном сервере PHP';
            $desc = 'Инструкция по запуску фреймворка HLEB на встроенном сервере PHP.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：在内置 PHP 服务器上运行';
            $desc = '在内置 PHP 服务器上运行 HLEB 框架的指南。';
        }

        return $this->content('start/start.php-server.page', $title, $desc);
    }
}
