<?php
// File /app/Controllers/Api/BaseApiActions.php

namespace App\Controllers\Api;

use Hleb\Base\Controller;
use Phphleb\ApiMultitool\BaseApiTrait;

class BaseApiActions extends Controller
{
    // Adding a set of traits for the API.
    use BaseApiTrait;

    function __construct(array $config = [])
    {
        parent::__construct($config);

        // Passing the debug mode value to the API constructor.
        $this->setApiBoxDebug($this->container->settings()->isDebug());
    }
}