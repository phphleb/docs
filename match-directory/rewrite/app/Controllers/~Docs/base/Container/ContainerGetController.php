<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ContainerGetController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Using the Container';
        $desc = 'Using the Container in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Использование контейнера';
            $desc = 'Использование контейнера во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：使用容器';
            $desc = 'HLEB 框架中使用容器。';
        }

        return $this->content('container/container.get.page', $title, $desc);

    }
}
