<?php
// File /app/Bootstrap/ContainerFactory.php
use Hleb\Static\DI;

// ... //

SenderServiceInterface::class => new MailTransportService(),

SiestaService::class => DI::method(DI::object(
    SiestaService::class,
    [
        'start' => (new DateTimeImmutable())->setTime(14, 0),
        'end' => (new DateTimeImmutable())->setTime(16, 0),
    ]
), 'setSender', ['transport' => DI::object(SenderServiceInterface::class)]),

// ... //


