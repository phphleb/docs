<?php
use Hleb\Static\DB;

$result = DB::run("SELECT * FROM users WHERE name=? AND address=?", [$name, $address])->fetchAll();
