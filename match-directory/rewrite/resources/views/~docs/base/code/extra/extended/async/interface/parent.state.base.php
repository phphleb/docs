<?php

class Example implements \Hleb\Base\RollbackInterface
{
    private static ?User $currentUser = null;

    #[\Override]
    public static function rollback(): void
    {
        self::$currentUser = null;
    }
}

class ChildExample extends Example
{
    /** @param User[] */
    private static array $currentUserFriends = [];

    #[\Override]
    public static function rollback(): void
    {
        parent::rollback();
        self::$currentUserFriends = [];
    }
}
