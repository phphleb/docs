<?php

namespace App\Commands\Demo;

use Hleb\Base\Task;

class ColoredTask extends Task
{
    protected function run(): int
    {
        $greenText = $this->color()->green('this text is green');
        $yellowText = $this->color()->yellow('this text is yellow');

        echo $greenText . " and " . $yellowText . PHP_EOL;

        return self::SUCCESS_CODE;
    }
}
