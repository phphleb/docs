<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class PhpServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'start/start.php-server.page',
            'Документация фреймворка HLEB2: Запуск на встроенном сервере PHP',
            'Инструкция по запуску фреймворка HLEB на встроенном сервере PHP.',
        );
    }
}
