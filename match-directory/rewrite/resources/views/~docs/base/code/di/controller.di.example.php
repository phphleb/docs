<?php

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Reference\LogInterface;

class ExampleController extends Controller
{
    public function __construct(private readonly LogInterface $logger, array $config = [])
    {
        parent::__construct($config);
    }

    public function first(LogInterface $logger): void
    {
        // variant 1
    }

    public function second(): void
    {
        // variant 2
        $logger = $this->logger;
    }
}
