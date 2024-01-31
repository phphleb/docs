<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\SessionInterface;
$value = Container::get(SessionInterface::class)->get('session_name');

// variant 2
use Hleb\Static\Session;
$value = Session::get('session_name');
