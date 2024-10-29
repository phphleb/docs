<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class DirectoryController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Project structure';
        $desc = 'Guide to project structure based on the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Структура проекта';
            $desc = 'Инструкция по структуре проекта на основе фреймворка HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：项目结构';
            $desc = '基于 HLEB 框架的项目结构指南';
        }

        return $this->content('directories.page', $title, $desc);
    }
}
