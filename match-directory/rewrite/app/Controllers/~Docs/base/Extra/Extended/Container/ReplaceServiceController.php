<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ReplaceServiceController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/container/container.extended.replace.page',
            'Фреймворк HLEB2: Подмена стандартных сервисов по в контейнере',
            'Замена стандартных сервисов во фреймворке HLEB.',
        );
    }
}
