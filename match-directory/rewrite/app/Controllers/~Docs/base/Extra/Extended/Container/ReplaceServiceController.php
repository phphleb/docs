<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ReplaceServiceController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Replacing Standard Services in Container';
        $desc = 'Replacing standard services in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Подмена стандартных сервисов по в контейнере';
            $desc = 'Замена стандартных сервисов во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：替换容器中的标准服务';

            $desc = 'HLEB 框架中替换标准服务。';
        }

        return $this->content('extra/extended/container/container.extended.replace.page', $title, $desc);
    }
}
