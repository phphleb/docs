<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ApiController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/libraries/api.page',
            'Фреймворк HLEB2: Набор трейтов для создания API',
            'Создание API с помощью фреймворка HLEB.',
        );
    }
}
