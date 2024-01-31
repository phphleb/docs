<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class TuningController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'tuning.page',
            'Документация фреймворка HLEB2: Настройка фреймворка',
            'Инструкция по настройке фреймворка HLEB.',
        );
    }
}
