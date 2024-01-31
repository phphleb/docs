<?php

declare(strict_types=1);

namespace App\Controllers\Docs;

use Hleb\Constructor\Data\View;

class TitleController  extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'title.page',
            'Список разделов документации фреймворка HLEB',
            'Оглавление документации фреймворка HLEB.',
        );
    }
}
