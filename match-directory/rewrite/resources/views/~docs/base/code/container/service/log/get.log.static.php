<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\LogInterface;
$data = Container::get(LogInterface::class)->info('Sample message');

// variant 2
use Hleb\Static\Log;
Log::info('Sample message');

// variant 3
logger()->info('Sample message');
