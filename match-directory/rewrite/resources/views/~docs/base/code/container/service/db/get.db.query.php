<?php
use Hleb\Static\DB;

$result = DB::dbQuery(sprintf("SELECT * FROM users WHERE name='%s' AND address='%s'", DB::quote($name), DB::quote($address)));
