<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class RouteController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'routes.page',
            'Документация фреймворка HLEB2: Маршрутизация',
            'Роутинг фреймворка HLEB.',
        );
    }
}
