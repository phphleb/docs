<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\RouterInterface;
$uri = Container::get(RouterInterface::class)->url('route.name');

// variant 2
use Hleb\Static\Router;
$uri = Router::url('route.name');
