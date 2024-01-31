<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\CookieInterface;
$value = Container::get(CookieInterface::class)->get('cookie_name');

// variant 2
use Hleb\Static\Cookies;
$value = Cookies::get('cookie_name');
