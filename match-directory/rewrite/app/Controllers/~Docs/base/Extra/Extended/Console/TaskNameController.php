<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TaskNameController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Custom Command Names';
        $desc = 'Customizable command names in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Пользовательские названия команд';
            $desc = 'Настраиваемые названия команд во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：自定义命令名称';
            $desc = 'HLEB 框架中的可定制命令名称。';
        }

        return $this->content('extra/extended/console/task.extended.name.page', $title, $desc);
    }
}
