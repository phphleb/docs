<?php
// variant 1
use Hleb\Reference\SessionInterface;
$value = $this->container->get(SessionInterface::class)->get('session_name');

// variant 2
$value = $this->container->session()->get('session_name');
