<?php
use Hleb\Reference\Interface\Log;

class Example
{
    public function run(Log $logger): string
    {
        $logger->info('Demo class method executed');

        return 'OK';
    }
}

use Hleb\Static\DI;

$result = DI::method(new Example(), 'run');
