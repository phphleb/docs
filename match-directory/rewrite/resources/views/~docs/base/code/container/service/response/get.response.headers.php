<?php

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Reference\Interface\Request;
use Hleb\Reference\Interface\Response;

class ExampleController extends Controller
{
    public function index(Request $request, Response $response): Response
    {
        $response->setHeader('Content-Type', 'application/json');

        $headerData = $response->getHeader('Content-Type');

        var_dump($headerData); // array(1) { [0]=> string(16) "application/json" }

        $response->setHeader('Content-Type', 'text/html; charset=utf-8');

        $headerData = $response->getHeader('Content-Type');

        var_dump($headerData); // array(1) { [0]=> string(24) "text/html; charset=utf-8" }

        return $response;
    }
}
