<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ResponseController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.response.page',
            'Документация фреймворка HLEB2: Объект Response',
            'Объект Response во фреймворке HLEB.',
        );
    }
}
