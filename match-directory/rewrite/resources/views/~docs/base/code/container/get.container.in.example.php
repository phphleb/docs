<?php

use App\Bootstrap\Services\RequestIdInterface;

class ExampleService extends \Hleb\Base\Container
{
    public RequestIdInterface $service;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->service = $this->container->get(RequestIdInterface::class);
    }
}

// Create an object with a framework container.
$requestIdService = (new ExampleService())->service;

// Create an object with a test container.
$config = ['container' => new TestContainer()];
$requestIdService = (new ExampleService($config))->service;
