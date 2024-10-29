<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class AddServiceController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Adding Service to Container';
        $desc = 'Adding service to the container in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Добавление сервиса в контейнер';
            $desc = 'Добавление сервиса в контейнер во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：将服务添加到容器';
            $desc = 'HLEB 框架中将服务添加到容器。';
        }

        return $this->content('extra/extended/container/container.extended.add.page', $title, $desc);
    }
}
