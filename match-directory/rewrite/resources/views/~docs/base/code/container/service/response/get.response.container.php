<?php
// variant 1
use Hleb\Reference\ResponseInterface;
$this->container->get(ResponseInterface::class)->set('Hello, world!');

// variant 2
$this->container->response()->set('Hello, world!');

// variant 3
$this->response()->set('Hello, world!');
