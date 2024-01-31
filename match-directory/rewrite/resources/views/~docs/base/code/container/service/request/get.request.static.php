<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\RequestInterface;
$method = Container::get(RequestInterface::class)->getMethod();

// variant 2
use Hleb\Static\Request;
$method = Request::getMethod();
