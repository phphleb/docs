<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class CachedTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'templates/template.cached.page',
            'Документация фреймворка HLEB2: Кешируемые шаблоны',
            'Инструкция фреймворка HLEB - кешируемые шаблоны.',
        );
    }
}
