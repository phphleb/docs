<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class PathController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'container/service/service.path.page',
            'Документация фреймворка HLEB2: Менеджер путей',
            'Управление путями к файлам и директориям во фреймворке HLEB.',
        );
    }
}
