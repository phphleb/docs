<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Extra\Extended\Console;

use App\Controllers\Docs\GlobalDocumentationController;
use Hleb\Constructor\Data\View;

class BowlingGameController extends GlobalDocumentationController
{
    public function index(): View
    {
        return $this->content(
            'extra/extended/console/bowling.game.page',
            'Фреймворк HLEB2: Консольная игра Боулинг',
            'Консольная игра Боулинг во фреймворке HLEB.',
        );
    }
}
