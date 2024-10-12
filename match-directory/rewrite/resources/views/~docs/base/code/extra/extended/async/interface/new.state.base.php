<?php

class Example implements \Hleb\Base\RollbackInterface
{
    private static ?User $currentUser = null;

    public function set(User $user): void
    {
        self::$currentUser = $user;
    }

    #[\Override]
    public static function rollback(): void
    {
        self::$currentUser = null;
    }
}
