<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class WebrotorServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Installation WebRotor server';
        $desc = 'Using an asynchronous WebRotor server on shared hosting.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Использование асинхронного сервера WebRotor';
            $desc = 'Использование асинхронного сервера WebRotor на общем хостинге.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2 框架文件：使用非同步 WebRotor 伺服器';
            $desc = '在共用主機上使用非同步 WebRotor 伺服器。';
        }

        return $this->content('start/start.webrotor.page', $title, $desc);
    }
}
