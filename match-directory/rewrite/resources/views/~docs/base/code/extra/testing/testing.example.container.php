<?php

use Hleb\Base\Container;
use Hleb\Reference\LogInterface;

class Example extends Container
{
    public function run(): string
    {
        $this->container->get(LogInterface::class)->info('Demo class method executed');

        return 'OK';
    }
}
// TestContainer has an interface App\Bootstrap\ContainerInterface.
$config = ['container' => new TestContainer()];

$result = (new Example($config))->run();

if ($result === 'OK') {
    // Successful test.
}