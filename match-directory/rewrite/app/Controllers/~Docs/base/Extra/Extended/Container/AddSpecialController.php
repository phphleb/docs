<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Container;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class AddSpecialController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Non-standard Use of Container';
        $desc = 'Special use of the container in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Нестандартное использование контейнера';
            $desc = 'Специальное использование контейнера во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：非常规容器使用';
            $desc = 'HLEB 框架中特殊使用容器。';
        }

        return $this->content('extra/extended/container/container.extended.prof.page', $title, $desc);
    }
}
