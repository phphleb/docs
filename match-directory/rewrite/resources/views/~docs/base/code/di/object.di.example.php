<?php

use Hleb\Reference\LogInterface;
use Hleb\Static\DI;

// Demo class for insertion.
class Insert
{
}

// Class with dependencies.
class Example
{
    public function __construct(private readonly LogInterface $logger)
    {
    }

    public function run(Insert $insert): void
    {
        echo $this->logger::class;
        echo ' & ';
        echo $insert::class;
    }
}

$exampleObject = DI::object(Example::class);

echo DI::method($exampleObject, 'run'); // Hleb\Reference\LogReference & Insert