<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class HostingServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Installation and Hosting Start';
        $desc = 'Installation and startup instructions for the HLEB framework on hosting.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Установка и запуск на хостинге';
            $desc = 'Инструкция по установке и запуску фреймворка HLEB на хостинге.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：安装和托管启动';
            $desc = '在托管上安装和启动 HLEB 框架的说明。';
        }

        return $this->content('start/start.hosting.page', $title, $desc);
    }
}
