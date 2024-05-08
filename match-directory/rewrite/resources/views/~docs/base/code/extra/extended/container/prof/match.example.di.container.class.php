<?php
// File /app/Bootstrap/ContainerFactory.php
use Hleb\Static\DI;
// ... //

ExampleService::class => new ExampleService(),

// variant 1
DemoService::class => new DemoService(DI::object(ExampleService::class)),

// variant 2
DemoService::class => DI::object(DemoService::class),

// ... //


