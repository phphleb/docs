<?php
// File /app/Bootstrap/ContainerFactory.php

namespace App\Bootstrap;

use App\Bootstrap\Services\RequestIdService;
use App\Bootstrap\Services\RequestIdInterface;
use Hleb\Constructor\Containers\BaseContainerFactory;

final class ContainerFactory extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        self::has($id) or self::$singletons[$id] = match ($id) {

            // New service controller.
            RequestIdInterface::class => new RequestIdService(),

            default => null
        };
        return self::$singletons[$id];
    }

    #[\Override]
    public static function rollback(): void
    {
        self::$singletons = [];
    }
}