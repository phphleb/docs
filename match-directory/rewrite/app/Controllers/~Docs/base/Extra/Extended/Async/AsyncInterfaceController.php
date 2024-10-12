<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Async;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class AsyncInterfaceController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/async/async.interface.page',
            'Фреймворк HLEB2: Сброс состояния для асинхронного запроса при помощи интерфейса RollbackInterface',
            'Сброс state для асинхронного запроса при помощи специального интерфейса.',
        );
    }
}
