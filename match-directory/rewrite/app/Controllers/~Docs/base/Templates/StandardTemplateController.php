<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class StandardTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'templates/template.standard.page',
            'Документация фреймворка HLEB2: Стандартные шаблоны',
            'Инструкция фреймворка HLEB - стандартные шаблоны.',
        );
    }
}
