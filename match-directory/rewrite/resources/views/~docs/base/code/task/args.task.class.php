<?php

namespace App\Commands\Demo;

use Hleb\Base\Task;

class ExampleTask extends Task
{
    /**
     * Connecting two values using `and`.
     */
    protected function run(string $argA, string $argB): int
    {
        echo $argA . ' and ' . $argB . PHP_EOL;

        return self::SUCCESS_CODE;
    }
}