<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class HloginController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: HLOGIN Registration Module';
        $desc = 'Registration module for the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Модуль регистрации HLOGIN';
            $desc = 'Модуль регистрации для фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：HLOGIN注册模块';
            $desc = 'HLEB 框架的注册模块。';
        }

        return $this->content('extra/libraries/hlogin.page', $title, $desc);
    }
}
