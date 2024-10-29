<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class RouterController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Route Data Interaction';
        $desc = 'Getting data from the router in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Взаимодействие с данными маршрутов';
            $desc = 'Получение данных из маршрутизатора во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：路由数据交互';
            $desc = '在 HLEB 框架中从路由器获取数据。';
        }

        return $this->content('container/service/service.router.page', $title, $desc);
    }
}
