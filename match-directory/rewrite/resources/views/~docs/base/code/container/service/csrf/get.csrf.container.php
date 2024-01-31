<?php
// variant 1
use Hleb\Reference\CsrfInterface;
$token = $this->container->get(CsrfInterface::class)->token();

// variant 2
$token = $this->container->csrf()->token();
