<?php
// File /app/Bootstrap/Events/TaskEvent.php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;

final class TaskEvent extends Event
{
    private ?TaskEventInterface $action = null;

    public function before(string $class, string $method, array $args): array
    {
        switch ($class) {
            case FirstTask::class:
                $this->action = new FirstTaskEvent($method);
                break;
            case SecondTask::class:
                $this->action = new SecondTaskEvent($method);
                break;
            // ... //
            default:
        }
        return $this->action ? $this->action->getBeforeAction($args) :  $args;
    }

    public function after(string $class, string $method, mixed &$result): void
    {
        $this->action and $result = $this->action->updateAfterAction($result);
    }

    public function statusCode(string $class, string $method, int $code): int
    {
        return $this->action ? $this->action->getCode($code) : $code;
    }
}
