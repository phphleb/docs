<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ApiController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: API Traits Set';
        $desc = 'Creating API using HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Набор трейтов для создания API';
            $desc = 'Создание API с помощью фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：API创建套件';
            $desc = '使用 HLEB 框架创建 API。';
        }

        return $this->content('extra/libraries/api.page', $title, $desc);
    }
}
