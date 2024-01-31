<?php

use Hleb\Static\Cookies;

// (!) Original raw data.
$rawValue = Cookies::get('cookie_name')->value();

// Validated data converted to string.
$clearedStringValue = Cookies::get('cookie_name')->asString();

// Data converted to an integer.
$integerValue = Cookies::get('cookie_name')->asInt();

// Data checked for a positive integer.
$positiveIntegerValue = Cookies::get('cookie_name')->asPositiveInt();