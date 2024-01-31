<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ContainerGetController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/container.get.page',
            'Документация фреймворка HLEB2: Использование контейнера',
            'Использование контейнера во фреймворке HLEB.',
        );
    }
}
