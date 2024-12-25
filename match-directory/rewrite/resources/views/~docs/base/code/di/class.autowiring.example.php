<?php

use Hleb\Base\Controller;
use Hleb\Constructor\Attributes\Autowiring\DI;

class ExampleController extends Controller
{
    public function index(
        #[DI(LocalFileStorage::class)]
        FileSystemInterface $storage,

        #[DI('\App\Notification\JwtAuthenticator')]
        AuthenticatorInterface $authenticator,

        #[DI(new EmailNotificationSender())]
        NotificationSenderInterface $notificationSender,
    ) {
        //...//
    }
}
