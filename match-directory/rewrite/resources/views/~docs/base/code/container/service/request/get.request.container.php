<?php
// variant 1
use Hleb\Reference\RequestInterface;
$method = $this->container->get(RequestInterface::class)->getMethod();

// variant 2
$method = $this->container->request()->getMethod();

// variant 3
$method = $this->request()->getMethod();
