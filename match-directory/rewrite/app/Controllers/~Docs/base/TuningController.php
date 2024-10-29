<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class TuningController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Framework tuning';
        $desc = 'Guide to configuring the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Настройка фреймворка';
            $desc = 'Инструкция по настройке фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：框架调优';
            $desc = 'HLEB 框架配置指南';
        }

        return $this->content('tuning.page', $title, $desc);
    }
}
