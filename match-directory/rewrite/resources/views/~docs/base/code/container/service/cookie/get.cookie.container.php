<?php
// variant 1
use Hleb\Reference\CookieInterface;
$value = $this->container->get(CookieInterface::class)->get('cookie_name');

// variant 2
$value = $this->container->cookies()->get('cookie_name');

// variant 3
$value = $this->cookies()->get('cookie_name');
