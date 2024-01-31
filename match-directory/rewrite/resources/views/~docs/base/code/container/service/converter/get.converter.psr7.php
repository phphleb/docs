<?php

use Hleb\Reference\RequestInterface;
use Hleb\Reference\ResponseInterface;
use Hleb\Static\Container;

// Request
$rq = Container::get(RequestInterface::class);
$psr7Response = new \Nyholm\Psr7\Request(
    $rq->getMethod(),
    (string)$rq->getUri(),
    $rq->getHeaders(),
    $rq->getRawBody(),
    $rq->getProtocolVersion(),
);

// Response
$rs = Container::get(ResponseInterface::class);
$psr7Response = new \Nyholm\Psr7\Response(
    $rs->getStatus(),
    $rs->getHeaders(),
    $rs->getBody(),
    $rs->getVersion(),
    $rs->getReason(),
);
