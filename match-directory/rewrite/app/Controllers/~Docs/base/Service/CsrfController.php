<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class CsrfController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: CSRF Protection';
        $desc = 'CSRF attack protection for the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Защита от CSRF-атак';
            $desc = 'Защита от CSRF-атак для фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：CSRF保护';
            $desc = 'HLEB 框架的 CSRF 攻击保护。';
        }

        return $this->content('container/service/service.csrf.page', $title, $desc);
    }
}
