<?php

use App\Bootstrap\Services\RequestIdInterface;
use Hleb\Static\Container;

// variant 1
$container = Container::getContainer();
$requestIdService = $container->get(RequestIdInterface::class);

// variant 2
$requestIdService = Container::get(RequestIdInterface::class);