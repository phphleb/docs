<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TestingController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Testing';
        $desc = 'Testing in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Тестирование';
            $desc = 'Тестирование для фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：测试';
            $desc = 'HLEB 框架中的测试。';
        }

        return $this->content('extra/testing.page', $title, $desc);
    }
}
