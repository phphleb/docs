<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class AdminpanController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/libraries/adminpan.page',
            'Фреймворк HLEB2: Модуль административной панели',
            'Админпанель для фреймворка HLEB.',
        );
    }
}
