<?php
use Hleb\Static\Cookies;

$options = [
    'expires' => time() + 60 * 60 * 24 * 30,
    'path' => '/',
    'domain' => '.example.com', // leading dot for compatibility or use subdomain
    'secure' => true,     // or false
    'httponly' => true,    // or false
    'samesite' => 'None' // None / Lax / Strict
];
Cookies::set('cookie_name', 'value', $options);