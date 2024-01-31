<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\CacheInterface;
$data = Container::get(CacheInterface::class)->get('cache_key');

// variant 2
use Hleb\Static\Cache;
$data = Cache::get('cache_key');
