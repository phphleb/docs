<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;
use Hleb\Static\Request;

class BowlingGameController extends GlobalDocumentationController
{
    public function index(): View
    {
        $lang = Request::param('lang')->toString();

        $title = 'HLEB2 framework: Console Bowling Game';
        $desc = 'Console Bowling Game in the HLEB framework.';

        if ($lang === 'ru') {
            $title = 'Фреймворк HLEB2: Консольная игра Боулинг';
            $desc = 'Консольная игра Боулинг во фреймворке HLEB.';
        }
        if ($lang === 'zh') {
            $title = 'HLEB2框架：控制台保龄球游戏';
            $desc = 'HLEB 框架中的控制台保龄球游戏。';
        }

        return $this->content('extra/extended/console/bowling.game.page', $title, $desc);
    }
}
