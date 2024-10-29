<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class RedirectController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Redirect Service';
        $desc = 'Redirect in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Сервис перенаправления';
            $desc = 'Редирект во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：重定向服务';
            $desc = 'HLEB 框架中的重定向。';
        }

        return $this->content('container/service/service.redirect.page', $title, $desc);
    }
}
