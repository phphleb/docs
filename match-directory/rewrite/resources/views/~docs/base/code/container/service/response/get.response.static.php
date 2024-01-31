<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\ResponseInterface;
Container::get(ResponseInterface::class)->set('Hello, world!');

// variant 2
use Hleb\Static\Response;
Response::set('Hello, world!');
