<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class CsrfController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.csrf.page',
            'Документация фреймворка HLEB2: Защита от CSRF-атак',
            'Защита от CSRF-атак для фреймворка HLEB.',
        );
    }
}
