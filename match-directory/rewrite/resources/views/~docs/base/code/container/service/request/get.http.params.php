<?php

use Hleb\Static\Request;

// (!) Original raw data.
$rawValue = Request::get('param')->value();

// Validated data converted to string.
$clearedStringValue = Request::get('param')->asString();

// Data converted to an integer.
$integerValue = Request::get('param')->asInt();

// Data checked for a positive integer.
$positiveIntegerValue = Request::get('param')->asPositiveInt();