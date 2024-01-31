<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class SettingsController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.settings.page',
            'Документация фреймворка HLEB2: Сервис Settings',
            'Получение настроек во фреймворке HLEB.',
        );
    }
}
