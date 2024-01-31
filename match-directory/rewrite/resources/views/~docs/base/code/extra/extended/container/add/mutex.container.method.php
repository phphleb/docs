<?php
use App\Bootstrap\Services\MutexService;

#[\Override]
final public function mutex(): MutexService
{
    return $this->get(MutexService::class);
}
