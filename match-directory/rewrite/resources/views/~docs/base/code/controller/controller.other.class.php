<?php

namespace App\Controllers;

use Hleb\Base\Controller;

class DefaultController extends Controller
{
    public function index(): mixed
    {
        return (new OtherController($this->config))->index();
    }
}
