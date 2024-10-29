<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Service;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class PathController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework documentation: Path Manager';
        $desc = 'Path management for files and directories in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Документация фреймворка HLEB2: Менеджер путей';
            $desc = 'Управление путями к файлам и директориям во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架文档：路径管理器';
            $desc = 'HLEB 框架中文件和目录的路径管理。';
        }

        return $this->content('container/service/service.path.page', $title, $desc);
    }
}
