<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class ConsoleController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'console.command.page',
            'Документация фреймворка HLEB2: Консольные команды',
            'Консольные команды во фреймворке HLEB.',
        );
    }
}
