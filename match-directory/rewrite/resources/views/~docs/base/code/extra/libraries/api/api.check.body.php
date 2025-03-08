<?php
use Hleb\Static\Request;

$data = Request::input();
// $result - a boolean value indicating whether the checks were successful or not.
$result = $this->check($data,
    [
        // Required field, type integer, minimum value 1.
        'id' => 'required|type:int|min:1',
        // Required field, type string, check via regular expression for correspondence to email.
        'email' => 'required|type:string|fullregex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        // Optional field, but will check for type string or NULL if found.
        'name' => 'type:string,null',
        // Required field, type string, at least 8 characters, must contain at least one digit and one uppercase letter.
        'password' => 'required|type:string|minlength:8|fullregex:/^(?=.*[0-9])(?=.*[A-Z]).+$/'
    ]);
$errorCells = $this->getErrorCells(); // An array with a list of fields that did not pass the check.
$errorMessage = $this->getErrorMessage(); // An array with messages about validation errors that occurred.
