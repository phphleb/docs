<?php
// File /app/Bootstrap/ContainerFactory.php

use Hleb\Constructor\Containers\BaseContainerFactory;

final class ContainerFactory extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        // ... //

        if (is_callable(self::$singletons[$id])) {
            self::$singletons[$id] = self::$singletons[$id]();
        }
        return self::$singletons[$id];
    }

    #[\Override]
    public static function setSingleton(string $id, object|callable|null $value): void
    {
        parent::setSingleton($id, $value);
    }
}


