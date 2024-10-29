<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TitleController  extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'List of HLEB framework documentation sections';
        $desc = 'Documentation table of contents for the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Список разделов документации фреймворка HLEB';
            $desc = 'Оглавление документации фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB框架文档部分列表';
            $desc = 'HLEB 框架的文档目录';
        }

        return $this->content('title.page', $title, $desc);
    }
}
