<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class HloginController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/libraries/hlogin.page',
            'Фреймворк HLEB2: Модуль регистрации HLOGIN',
            'Модуль регистрации для фреймворка HLEB.',
        );
    }
}
