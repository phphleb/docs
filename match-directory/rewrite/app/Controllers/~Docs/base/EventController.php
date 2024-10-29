<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class EventController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Events';
        $desc = 'Events in the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: События';
            $desc = 'События во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：事件';
            $desc = 'HLEB 框架中的事件';
        }

        return $this->content('events/events.page', $title, $desc);
    }
}
