<?php

use Phphleb\Hlogin\App\AuthUser;

$user = AuthUser::current();
if ($user) {
    // Status for the confirmed user.
    $confirm = $user->isConfirm();

    // Obtaining the user's E-mail.
    $email = $user->getEmail();

    // Result of the administrator check.
    $isAdmin = $user->isSuperAdmin();
    // ... //
} else {
    // The current user is not authorized.
}