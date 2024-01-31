<?php
// File /public/index.php

use Spiral\RoadRunner;
use Nyholm\Psr7;

ini_set('display_errors', 'stderr');

include __DIR__ . "/../vendor/autoload.php";

$worker = RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$psr7 = new RoadRunner\Http\PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

// Framework initialization outside the loop.
$framework = new Hleb\HlebAsyncBootstrap(__DIR__);

while ($request = $psr7->waitRequest()) {
    try {
        // Getting an object with a response.
        $response = $framework->load($request)->getResponse();

        // Convert the framework response to a handler format.
        $psr7->respond(new Psr7\Response(...$response->getArgs()));

    } catch (\Throwable $e) {
        $psr7->respond(new Psr7\Response(500, [], 'Something Went Wrong!'));
        $framework->errorLog($e);
    }
}
