<?php
// variant 1
use Hleb\Reference\LogInterface;
$this->container->get(LogInterface::class)->info('Sample message');

// variant 2
$this->container->log()->info('Sample message');
