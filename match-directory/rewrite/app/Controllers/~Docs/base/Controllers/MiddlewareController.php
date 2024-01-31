<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Controllers;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class MiddlewareController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'controllers/controller.middleware.page',
            'Документация фреймворка HLEB2: Контроллер-посредник Middleware',
            'Инструкция фреймворка HLEB - Middleware.',
        );
    }
}
