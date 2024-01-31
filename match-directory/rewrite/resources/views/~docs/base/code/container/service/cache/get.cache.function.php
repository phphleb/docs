<?php

use Hleb\Static\Cache;

$param = 10;
$data = Cache::getConform('example_cache_key',
    function () use ($param) {
        return mt_rand() * $param; // Data calculation.
    }, ttl: 60);
