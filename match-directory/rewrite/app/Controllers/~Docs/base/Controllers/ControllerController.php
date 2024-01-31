<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ControllerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'controllers/controller.controller.page',
            'Документация фреймворка HLEB2: Контроллер',
            'Инструкция фреймворка HLEB - Контроллер.',
        );
    }
}
