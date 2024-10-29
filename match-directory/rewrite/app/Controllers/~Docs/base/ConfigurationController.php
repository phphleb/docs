<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ConfigurationController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Configuration setup';
        $desc = 'Guide to configuring HLEB framework files';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Настройка конфигурации';
            $desc = 'Инструкция по настройке конфигурационных файлов фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：配置设置';
            $desc = 'HLEB 框架文件配置指南';
        }

        return $this->content('configuration.page', $title, $desc);
    }
}
