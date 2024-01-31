<?php
use App\Controllers\ExampleController;
use Hleb\Main\Logger\NullLogger;

$controller = new ExampleController();
$logger = new NullLogger();
$result = $controller->index($logger);

if ($result === 'OK') {
    // Successful test.
}
