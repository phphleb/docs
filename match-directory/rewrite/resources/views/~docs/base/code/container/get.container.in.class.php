<?php
// File /app/Controllers/ExampleController.php

namespace App\Controllers;

use App\Bootstrap\Services\RequestIdInterface;
use Hleb\Base\Controller;

class ExampleController extends Controller
{
    public function index(): void
    {
        // variant 1
        $requestIdService = $this->container->get(RequestIdInterface::class);
        // variant 2
        $requestIdService = $this->container->requestId();
    }
}
