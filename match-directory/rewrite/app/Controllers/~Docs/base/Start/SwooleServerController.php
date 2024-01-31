<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class SwooleServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'start/start.swoole.page',
            'Документация фреймворка HLEB2: Запуск при помощи Swoole',
            'Инструкция по запуску фреймворка HLEB c использованием Swoole.',
        );
    }
}
