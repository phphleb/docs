<?php
$result = $this->check(
    [
        ['name1' => ['name2' => ['name3' => 'text']]],// Data.
        ['[name1][name2][name3]' => 'required|type:string'] // Array with conditions.
    ]);