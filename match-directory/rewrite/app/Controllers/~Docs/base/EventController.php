<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class EventController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'events/events.page',
            'Документация фреймворка HLEB2: События',
            'События во фреймворке HLEB.',
        );
    }
}
