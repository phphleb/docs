<?php
use App\Bootstrap\Services\MutexService;
use Hleb\Static\Container;

$mutex = Container::get(MutexService::class);
