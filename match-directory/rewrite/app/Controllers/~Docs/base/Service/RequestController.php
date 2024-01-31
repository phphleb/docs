<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class RequestController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.request.page',
            'Документация фреймворка HLEB2: Объект Request',
            'Объект Request во фреймворке HLEB.',
        );
    }
}
