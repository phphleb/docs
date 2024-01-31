<?php
// File /public/index.php

// use Swoole\Http\{Request, Response, Server};
use OpenSwoole\Http\{Request, Response, Server};

include __DIR__ . "/../vendor/autoload.php";

$http = new Server('127.0.0.1', 9504);
$http->set([
    'log_file' => '/dev/stdout'
]);

// Framework initialization outside the loop.
$framework = new Hleb\HlebAsyncBootstrap(__DIR__);

$http->on('request', function ($request, Response $response) use ($framework) {
    // Getting an object with a response.
    $res = $framework->load($request)->getResponse();
    foreach ($res->getHeaders() as $name => $header) {
        $response->header($name, $header);
    }
    $response->status($res->getStatus(), (string)$res->getReason());
    $response->end($res->getBody());
});

$http->start();
