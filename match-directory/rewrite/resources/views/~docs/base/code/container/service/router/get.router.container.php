<?php
// variant 1
use Hleb\Reference\RouterInterface;
$uri = $this->container->get(RouterInterface::class)->url('route.name');

// variant 2
$uri = $this->container->router()->url('route.name');

// variant 3
$uri = $this->router()->url('route.name');
