<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class AboutController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'about.page',
            'Документация фреймворка HLEB2: Информация о проекте',
            'Информация о фреймворке HLEB',
        );
    }
}
