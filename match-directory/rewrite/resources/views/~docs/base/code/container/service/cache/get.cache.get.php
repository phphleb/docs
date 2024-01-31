<?php

use Hleb\Static\Cache;

$key = 'example_cache_key';

if (!Cache::has($key)) {
    $data = mt_rand(); // Receiving data.
    Cache::set($key, $data, ttl: 60);
} else {
    $data = Cache::get($key);
}
