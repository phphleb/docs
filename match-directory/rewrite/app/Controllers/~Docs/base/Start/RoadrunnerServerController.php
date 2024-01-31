<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Start;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class RoadrunnerServerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'start/start.roadrunner.page',
            'Документация фреймворка HLEB2: Запуск при помощи Roadrunner',
            'Инструкция по запуску фреймворка HLEB c использованием Roadrunner.',
        );
    }
}
