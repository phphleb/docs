<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class AboutController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Project information';
        $desc = 'Information about the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Информация о проекте';
            $desc = 'Информация о фреймворке HLEB';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：项目信息';
            $desc = '有关 HLEB 框架的信息';
        }

        return $this->content('about.page', $title, $desc);
    }
}
