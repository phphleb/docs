<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Libraries;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class AdminpanController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Admin Panel Module';
        $desc = 'Admin panel for the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Модуль административной панели';
            $desc = 'Админпанель для фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：管理面板模块';
            $desc = 'HLEB 框架的管理面板。';
        }

        return $this->content('extra/libraries/adminpan.page', $title, $desc);
    }
}
