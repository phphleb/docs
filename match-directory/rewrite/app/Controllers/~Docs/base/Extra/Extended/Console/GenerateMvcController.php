<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class GenerateMvcController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/console/generate.mvc.page',
            'Фреймворк HLEB2: Генерация MVC-шаблонов',
            'Генерация MVC сущностей во фреймворке HLEB.',
        );
    }
}
