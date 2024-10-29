<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TaskArgController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Extended Command Arguments';
        $desc = 'Extended command arguments in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Расширенные аргументы команд';
            $desc = 'Расширенные аргументы команд во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：扩展命令参数';
            $desc = 'HLEB 框架中的扩展命令参数。';
        }

        return $this->content('extra/extended/console/task.extended.args.page', $title, $desc);
    }
}
