<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class InstallationController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'installation.page',
            'Документация фреймворка HLEB2: Установка',
            'Инструкция по установке фреймворка HLEB.',
        );
    }
}
