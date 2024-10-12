<?php

class Example
{
    private static ?User $currentUser = null;

    public function set(User $user): void
    {
        self::$currentUser = $user;
    }
}
