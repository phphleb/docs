<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ResponseController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Response Object';
        $desc = 'Response object in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Объект Response';
            $desc = 'Объект Response во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：Response对象';
            $desc = 'HLEB 框架中的 Response 对象。';
        }

        return $this->content('container/service/service.response.page', $title, $desc);
    }
}
