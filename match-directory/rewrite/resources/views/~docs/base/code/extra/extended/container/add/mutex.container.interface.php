<?php
// File /app/Bootstrap/Services/MutexServiceInterface.php

namespace App\Bootstrap\Services;

interface MutexServiceInterface
{
    public function acquire(string $name, ?int $sec = null): bool;
    public function release(string $name): bool;
    public function unlock(string $name): bool;
}

