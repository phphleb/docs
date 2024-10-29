<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ConsoleController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Console commands';
        $desc = 'Console commands in the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Консольные команды';
            $desc = 'Консольные команды во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：控制台命令';
            $desc = 'HLEB 框架中的控制台命令';
        }

        return $this->content('console.command.page', $title, $desc);
    }
}
