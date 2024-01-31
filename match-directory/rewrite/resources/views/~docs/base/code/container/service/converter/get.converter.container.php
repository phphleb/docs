<?php
// variant 1
use Hleb\Reference\ConverterInterface;
$logger = $this->container->get(ConverterInterface::class)->toPsr3Logger();

// variant 2
$logger = $this->container->converter()->toPsr3Logger();
