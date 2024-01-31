<?php
use App\Bootstrap\Services\MutexServiceInterface;
use Hleb\Static\Container;

$mutex = Container::get(MutexServiceInterface::class);