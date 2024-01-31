<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class LogController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.log.page',
            'Документация фреймворка HLEB2: Логирование данных',
            'Сервис Log во фреймворке HLEB.',
        );
    }
}
