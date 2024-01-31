<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Templates;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class TwigTemplateController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'templates/template.twig.page',
            'Документация фреймворка HLEB2: Шаблоны TWIG',
            'Инструкция фреймворка HLEB - шаблоны TWIG.',
        );
    }
}
