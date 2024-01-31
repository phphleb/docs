<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class TestingController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/testing.page',
            'Фреймворк HLEB2: Тестирование',
            'Тестирование для фреймворка HLEB.',
        );
    }
}
