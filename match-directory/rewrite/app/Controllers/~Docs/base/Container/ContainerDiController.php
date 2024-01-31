<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ContainerDiController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/container.di.page',
            'Документация фреймворка HLEB2: Внедрение зависимостей',
            'Внедрение зависимостей во фреймворке HLEB.',
        );
    }
}
