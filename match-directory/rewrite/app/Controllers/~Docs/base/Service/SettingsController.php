<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class SettingsController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Settings Service';
        $desc = 'Retrieving settings in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Сервис Settings';
            $desc = 'Получение настроек во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：Settings服务';
            $desc = '在 HLEB 框架中检索设置。';
        }

        return $this->content('container/service/service.settings.page', $title, $desc);
    }
}
