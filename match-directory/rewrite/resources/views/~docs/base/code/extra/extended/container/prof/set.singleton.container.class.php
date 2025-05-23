<?php
// File /app/Bootstrap/ContainerFactory.php

use Hleb\Constructor\Containers\BaseContainerFactory;

final class ContainerFactory extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        // ... //

        if (self::$singletons[$id] instanceof \Closure) {
            self::$singletons[$id] = self::$singletons[$id]();
        }
        return self::$singletons[$id];
    }

    #[\Override]
    public static function setSingleton(string $id, object|null $value): void
    {
        parent::setSingleton($id, $value);
    }
}


