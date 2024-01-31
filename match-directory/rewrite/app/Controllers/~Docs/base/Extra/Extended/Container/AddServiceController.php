<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class AddServiceController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/container/container.extended.add.page',
            'Фреймворк HLEB2: Добавление сервиса в контейнер',
            'Добавление сервиса в контейнер во фреймворке HLEB.',
        );
    }
}
