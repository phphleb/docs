<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class WebConsoleController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Web Console';
        $desc = 'Web console in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Веб-консоль';
            $desc = 'Веб-консоль во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：网络控制台';
            $desc = 'HLEB 框架中的网络控制台。';
        }

        return $this->content('extra/extended/web.console.page', $title, $desc);
    }
}
