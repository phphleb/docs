<?php
// File /public_html/index.php

use Phphleb\Webrotor\Config;
use Phphleb\Webrotor\Src\Handler\NyholmPsr7Creator;
use Phphleb\Webrotor\WebRotor;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

include __DIR__ . "/../vendor/autoload.php";

$psr7Creator = new NyholmPsr7Creator(); // or GuzzlePsr7Creator()

$config = new Config();
$config->logLevel = 'warning';
$config->workerNum = 2; // Must correspond to the number of workers
$config->workerLifetimeSec = 120; // Must correspond to the worker launch interval
$config->runtimeDirectory = __DIR__ . '/../storage/wr-runtime';
$config->logDirectory = __DIR__ . '/../storage/wr-logs';

$server = new WebRotor($config);
$server->init($psr7Creator);

// Framework initialization outside the loop.
$framework = new Hleb\HlebAsyncBootstrap(__DIR__);

$server->run(function(ServerRequestInterface $request, ResponseInterface $response) use ($framework) {
    $res = $framework->load($request)->getResponse();

    $response->getBody()->write($res->getBody());
    foreach($res->getHeaders() as $name => $header) {
        $response = $response->withHeader($name, $header);
    }
    return $response->withStatus($res->getStatus());
});
