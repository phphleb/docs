<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class InstallationController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Installation';
        $desc = 'Guide to installing the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Установка';
            $desc = 'Инструкция по установке фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：安装';
            $desc = 'HLEB 框架安装指南';
        }

        return $this->content('installation.page', $title, $desc);
    }
}
