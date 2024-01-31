<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ModuleController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'controllers/controller.module.page',
            'Документация фреймворка HLEB2: Модуль',
            'Инструкция фреймворка HLEB - Модуль.',
        );
    }
}
