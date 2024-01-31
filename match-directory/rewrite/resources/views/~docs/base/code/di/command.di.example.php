<?php

namespace App\Commands\Demo;

use Hleb\Base\Task;
use Hleb\Reference\LogInterface;

class ExampleTask extends Task
{
    public function __construct(private readonly LogInterface $logger, array $config = [])
    {
        parent::__construct($config);
    }

    protected function run(): int
    {
        $logger = $this->logger;

        return self::SUCCESS_CODE;
    }
}