<?php
use App\Bootstrap\Services\MutexService;
use App\Bootstrap\Services\MutexServiceInterface;

#[\Override]
final public function mutex(): MutexServiceInterface
{
    return $this->get(MutexServiceInterface::class);
}