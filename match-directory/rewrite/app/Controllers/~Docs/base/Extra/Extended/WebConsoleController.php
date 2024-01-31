<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class WebConsoleController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/web.console.page',
            'Фреймворк HLEB2: Веб-консоль',
            'Веб-консоль во фреймворке HLEB.',
        );
    }
}
