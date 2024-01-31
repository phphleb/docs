<?php

use Hleb\Static\Request;

$page = Request::param('page')->asString(); // main

$version = Request::param('version')->asPositiveInt(); // 10