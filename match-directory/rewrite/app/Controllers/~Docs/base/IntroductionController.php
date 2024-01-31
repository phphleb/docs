<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class IntroductionController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'introduction.page',
            'Документация фреймворка HLEB2: Введение в разработку',
            'Инструкция по использованию фреймворка HLEB. Введение',
        );
    }
}
