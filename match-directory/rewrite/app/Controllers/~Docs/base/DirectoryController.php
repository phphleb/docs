<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class DirectoryController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'directories.page',
            'Документация фреймворка HLEB2: Структура проекта',
            'Инструкция по структуре проекта на основе фреймворка HLEB.',
        );
    }
}
