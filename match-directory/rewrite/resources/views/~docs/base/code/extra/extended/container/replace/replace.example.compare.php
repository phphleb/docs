<?php
// File /app/Bootstrap/ContainerFactory.php

namespace App\Bootstrap;

use Hleb\Constructor\Containers\BaseContainerFactory;
use Hleb\Reference\CacheInterface;

final class ContainerFactory extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        self::has($id) or self::$singletons[$id] = match ($id) {
            // Adding a replacement for a service.
            CacheInterface::class => new OtherCacheService(),

            // ... //
            default => null
        };
        return self::$singletons[$id];
    }

    public static function rollback(): void
    {
        // ... //
    }
}