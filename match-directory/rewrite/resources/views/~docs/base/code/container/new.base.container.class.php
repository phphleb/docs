<?php
// File /app/Bootstrap/BaseContainer.php

namespace App\Bootstrap;

use App\Bootstrap\Services\RequestIdInterface;
use Hleb\Constructor\Containers\CoreContainer;

final class BaseContainer extends CoreContainer implements ContainerInterface
{
    #[\Override]
    final public function get(string $id): mixed
    {
        return ContainerFactory::getSingleton($id) ?? match ($id) {

            // ... //

            default => parent::get($id),
        };
    }

    // New method.
    #[\Override]
    final public function requestId(): RequestIdInterface
    {
        return $this->get(RequestIdInterface::class);
    }
}