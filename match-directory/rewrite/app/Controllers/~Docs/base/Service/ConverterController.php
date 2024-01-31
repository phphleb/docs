<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class ConverterController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.converter.page',
            'Документация фреймворка HLEB2: Преобразование в PSR',
            'Преобразование в PSR для фреймворка HLEB.',
        );
    }
}
