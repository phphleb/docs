<?php
// variant 1
use Hleb\Reference\CacheInterface;
$data = $this->container->get(CacheInterface::class)->get('cache_key');

// variant 2
$data = $this->container->cache()->get('cache_key');
