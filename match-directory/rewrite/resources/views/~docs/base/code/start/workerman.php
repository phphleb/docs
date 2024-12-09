<?php
// File /public/index.php

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Protocols\Http\Response;

include __DIR__ . "/../vendor/autoload.php";

// Framework initialization outside the loop.
$framework = new Hleb\HlebAsyncBootstrap(__DIR__);

$server = new Worker( "http://127.0.0.1:2345");

// Set the number of processes used (for example, 4).
$server->count = 4;

$server->onMessage = function (TcpConnection $connection, $request) use ($framework) {
    $res = $framework->load($request)->getResponse();

    $connection->send(new Response($res->getStatus(), $res->getHeaders(),  $res->getBody()));
};

Worker::runAll();
