<?php
// File /app/Bootstrap/Events/ControllerEvent.php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;

final class ControllerEvent extends Event
{
    public function before(string $class, string $method, array $arguments): array|false
    {
        switch([$class, $method]) {
            case [ExampleController::class, 'index']:
                return (new ExampleControllerEvent())->beforeIndex($arguments);
                // ... //
            default:
        }
        return $arguments;
    }

    public function after(string $class, string $method, mixed &$result): void
    {
        // ... //
    }
}
