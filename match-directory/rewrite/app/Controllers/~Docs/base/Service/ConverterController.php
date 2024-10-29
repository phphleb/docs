<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ConverterController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: PSR Conversion';
        $desc = 'Conversion to PSR for the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Преобразование в PSR';
            $desc = 'Преобразование в PSR для фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：PSR转换';
            $desc = 'HLEB 框架的 PSR 转换。';
        }

        return $this->content('container/service/service.converter.page', $title, $desc);
    }
}
