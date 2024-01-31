<?php

use Hleb\Static\Cache;

$data = Cache::getConform('example_cache_key', function () {
    return mt_rand(); // Receiving data.
}, ttl: 60);
