<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class ModelController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Model';
        $desc = 'Model in the HLEB framework';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Модель';
            $desc = 'Модель во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：模型';
            $desc = 'HLEB 框架中的模型';
        }

        return $this->content('models.page', $title, $desc);
    }
}
