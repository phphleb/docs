<?php
// File /app/Bootstrap/Services/MutexService.php

namespace App\Bootstrap\Services;

use Phphleb\Conductor\Src\Scheme\MutexInterface;

class MutexService
{
    public function __construct(private MutexInterface $mutex) { }

    public function acquire(string $name, ?int $sec = null): bool
    {
        return $this->mutex->acquire($name, $sec);
    }

    public function release(string $name): bool
    {
        return $this->mutex->release($name);
    }

    public function unlock(string $name): bool
    {
        return $this->mutex->unlock($name);
    }
}
