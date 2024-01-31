<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class CookiesController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.cookies.page',
            'Документация фреймворка HLEB2: Пользовательские cookies',
            'COOKIES во фреймворке HLEB.',
        );
    }
}
