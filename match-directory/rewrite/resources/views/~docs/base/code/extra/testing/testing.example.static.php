<?php

use Hleb\Static\Log;

class Example
{
    public function run(): string
    {
        Log::info('Demo class method executed');

        return 'OK';
    }
}

use Hleb\Main\Logger\NullLogger;
use Hleb\Init\ShootOneselfInTheFoot\LogForTest;

$logger = new NullLogger();

LogForTest::set($logger);

$result = (new Example())->run();

LogForTest::cancel();

if ($result === 'OK') {
    // Successful test.
}