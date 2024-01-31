<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class DbController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.db.page',
            'Документация фреймворка HLEB2: Использование баз данных',
            'Сервис DB во фреймворке HLEB.',
        );
    }
}
