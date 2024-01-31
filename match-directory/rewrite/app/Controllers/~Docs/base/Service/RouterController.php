<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class RouterController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.router.page',
            'Документация фреймворка HLEB2: Взаимодействие с данными маршрутов',
            'Получение данных из маршрутизатора во фреймворке HLEB.',
        );
    }
}
