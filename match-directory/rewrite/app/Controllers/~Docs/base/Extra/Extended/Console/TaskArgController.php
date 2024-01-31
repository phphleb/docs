<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class TaskArgController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/console/task.extended.args.page',
            'Фреймворк HLEB2: Расширенные аргументы команд',
            'Расширенные аргументы команд во фреймворке HLEB.',
        );
    }
}
