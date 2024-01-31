<?php

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Reference\Interface\Log;

class ExampleController extends Controller
{
    public function index(Log $logger): string
    {
        $logger->info('Request to demo controller');

        return 'OK';
    }
}