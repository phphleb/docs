<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class ModelController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'models.page',
            'Документация фреймворка HLEB2: Модель',
            'Модель во фреймворке HLEB.',
        );
    }
}
