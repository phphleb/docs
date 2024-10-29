<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Async;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class AsyncInterfaceController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Rollback state for asynchronous request using RollbackInterface';
        $desc = 'Rollback state for asynchronous request using a special interface.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Сброс состояния для асинхронного запроса при помощи интерфейса RollbackInterface';
            $desc = 'Сброс state для асинхронного запроса при помощи специального интерфейса.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：通过RollbackInterface接口回滚异步请求的状态';
            $desc = '使用特殊接口回滚异步请求的状态。';
        }

        return $this->content('extra/extended/async/async.interface.page', $title, $desc);
    }
}
