<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class CacheController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.cache.page',
            'Документация фреймворка HLEB2: Кеширование данных',
            'Кеширование во фреймворке HLEB.',
        );
    }
}
