<?php
use App\Bootstrap\Services\MutexServiceInterface;

$mutex = $this->container->get(MutexServiceInterface::class);