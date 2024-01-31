<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ApacheServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'start/start.apache.page',
            'Документация фреймворка HLEB2: Запуск при помощи Apache',
            'Инструкция по запуску фреймворка HLEB при помощи Apache.',
        );
    }
}
