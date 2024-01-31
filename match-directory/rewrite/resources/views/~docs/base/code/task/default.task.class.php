<?php

namespace App\Commands\Demo;

use Hleb\Base\Task;

class ExampleTask extends Task
{
    /**
     * Short description of the action.
     */
    protected function run(?string $arg = null): int
    {
        // Your code here.

        return self::SUCCESS_CODE;
    }
}