<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class TaskNameController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/console/task.extended.name.page',
            'Фреймворк HLEB2: Пользовательские названия команд',
            'Настраиваемые названия команд во фреймворке HLEB.',
        );
    }
}
