<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class CacheController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Data Caching';
        $desc = 'Caching in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Кеширование данных';
            $desc = 'Кеширование во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：数据缓存';
            $desc = 'HLEB 框架中的缓存。';
        }

        return $this->content('container/service/service.cache.page', $title, $desc);
    }
}
