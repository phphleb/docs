<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ContainerController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/container.container.page',
            'Документация фреймворка HLEB2: Контейнер',
            'Контейнеры во фреймворке HLEB.',
        );
    }
}
