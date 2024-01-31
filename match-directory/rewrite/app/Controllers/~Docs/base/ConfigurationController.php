<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class ConfigurationController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'configuration.page',
            'Документация фреймворка HLEB2: Настройка конфигурации',
            'Инструкция по настройке конфигурационных файлов фреймворка HLEB.',
        );
    }
}
