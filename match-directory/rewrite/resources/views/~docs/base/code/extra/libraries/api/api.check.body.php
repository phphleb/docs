<?php
use Hleb\Static\Request;

$data = Request::input();
// $result - a boolean value indicating whether the checks were successful or not.
$result = $this->check($data,
    [
        'id' => 'required|type:int|min:1', // Required field, type integer, minimum value 1.
        'email' => 'required|type:string', // Required field, type string.
        'name' => 'type:string,null', // Optional field, but will check for type string or NULL if found.
        'password' => 'required|type:string|minlength:6' // Required field, type string, minimum number of characters 6.
    ]);
$errorCells = $this->getErrorCells(); // An array with a list of fields that did not pass the check.
$errorMessage = $this->getErrorMessage(); // An array with messages about validation errors that occurred.