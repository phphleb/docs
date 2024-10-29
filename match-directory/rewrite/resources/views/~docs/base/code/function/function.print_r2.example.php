<?php

use Hleb\Static\Request;

$debugData = Request::param('test')->toString();

print_r2($debugData, name: "Printing the value of `test` from a dynamic route.");
