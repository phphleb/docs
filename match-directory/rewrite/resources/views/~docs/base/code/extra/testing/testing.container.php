<?php
// File /app/Bootstrap/BaseContainer.php

namespace App\Bootstrap;

use Hleb\Constructor\Containers\CoreContainer;

final class BaseContainer extends CoreContainer implements ContainerInterface
{
    private ?ContainerInterface $testContainer = null;

    #[\Override]
    final public function get(string $id): mixed
    {
        if (get_constant('APP_TEST_ON')) {
            if ($this->testContainer === null) {
                $this->testContainer = new TestContainer();
            }
            return $this->testContainer->get($id);
        }

        return ContainerFactory::getSingleton($id) ?? match ($id) {

            // ... //

            default => parent::get($id),
        };
    }
}