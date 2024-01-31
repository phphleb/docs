<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class RedirectController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.redirect.page',
            'Документация фреймворка HLEB2: Сервис перенаправления',
            'Редирект во фреймворке HLEB.',
        );
    }
}
