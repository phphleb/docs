<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class AddSpecialController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/container/container.extended.prof.page',
            'Фреймворк HLEB2: Нестандартное использование контейнера',
            'Специальное использование контейнера во фреймворке HLEB.',
        );
    }
}
