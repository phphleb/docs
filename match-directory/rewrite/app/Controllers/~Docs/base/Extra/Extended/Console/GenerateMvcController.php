<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class GenerateMvcController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Generating MVC Templates';
        $desc = 'Generating MVC entities in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Генерация MVC-шаблонов';
            $desc = 'Генерация MVC сущностей во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：生成MVC模板';
            $desc = 'HLEB 框架中的MVC实体生成。';
        }

        return $this->content('extra/extended/console/generate.mvc.page', $title, $desc);
    }
}
