<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class SessionController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.session.page',
            'Документация фреймворка HLEB2: Использование пользовательских сессий',
            'SESSION во фреймворке HLEB.',
        );
    }
}
