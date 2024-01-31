<?php

use Hleb\Main\Logger\NullLogger;
use Hleb\Static\DI;

$result = DI::method(new Example(), 'run', ['logger' => new NullLogger()]);

if ($result === 'OK') {
    // Successful test.
}