<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class CookiesController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Custom Cookies';
        $desc = 'COOKIES in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Пользовательские cookies';
            $desc = 'COOKIES во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：自定义Cookies';
            $desc = 'HLEB 框架中的 COOKIES。';
        }

        return $this->content('container/service/service.cookies.page', $title, $desc);
    }
}
