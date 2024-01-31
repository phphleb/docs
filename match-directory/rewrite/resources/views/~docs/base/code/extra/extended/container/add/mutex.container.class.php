<?php
// File /app/Bootstrap/Services/MutexService.php

namespace App\Bootstrap\Services;

use Phphleb\Conductor\Src\Scheme\MutexInterface;

class MutexService implements MutexServiceInterface
{
    public function __construct(private MutexInterface $mutex) { }
    #[\Override]
    public function acquire(string $name, ?int $sec = null): bool
    {
        return $this->mutex->acquire($name, $sec);
    }
    #[\Override]
    public function release(string $name): bool
    {
        return $this->mutex->release($name);
    }
    #[\Override]
    public function unlock(string $name): bool
    {
        return $this->mutex->unlock($name);
    }
}