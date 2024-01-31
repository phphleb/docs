<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class HostingServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'start/start.hosting.page',
            'Документация фреймворка HLEB2: Установка и запуск на хостинге',
            'Инструкция по установке и запуску фреймворка HLEB на хостинге.',
        );
    }
}
