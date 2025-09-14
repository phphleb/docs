<?php

class ExampleLogerService implements \Hleb\Base\ResetInterface
{
    public function __construct(private Monolog $logger)
    {
    }

    #[\Override]
    public function reset(): void
    {
        $this->logger->reset();
    }
}
