<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class SessionController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Custom Session Usage';
        $desc = 'SESSION in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Использование пользовательских сессий';
            $desc = 'SESSION во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：自定义会话使用';
            $desc = 'HLEB 框架中的 SESSION。';
        }

        return $this->content('container/service/service.session.page', $title, $desc);
    }
}
