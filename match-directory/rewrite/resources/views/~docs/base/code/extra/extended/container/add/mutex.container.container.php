<?php
// File /app/Bootstrap/ContainerFactory.php

namespace App\Bootstrap;

use App\Bootstrap\Services\MutexService;
use App\Bootstrap\Services\MutexServiceInterface;
use Hleb\Constructor\Containers\BaseContainerFactory;
use Phphleb\Conductor\FileMutex;
use Phphleb\Conductor\Src\MutexDirector;

final class ContainerFactory extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        self::has($id) or self::$singletons[$id] = match ($id) {
            // New service as singleton.
            MutexServiceInterface::class => new MutexService(new FileMutex()),

            // ... //
            default => null
        };
        return self::$singletons[$id];
    }

    public static function rollback(): void
    {
        // Rollback for an asynchronous request.
        MutexDirector::rollback();

        // ... //
    }
}