<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ContainerDiController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Dependency Injection';
        $desc = 'Dependency Injection in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Внедрение зависимостей';
            $desc = 'Внедрение зависимостей во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：依赖注入';
            $desc = 'HLEB 框架中的依赖注入。';
        }

        return $this->content('container/container.di.page', $title, $desc);
    }
}
