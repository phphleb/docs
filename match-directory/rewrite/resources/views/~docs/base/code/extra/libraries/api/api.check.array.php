<?php
$result = $this->check($data,
    [
        // Optional field, array with enumeration (two fields are checked in each).
        'users' => ['id' => 'required|type:int', 'name' => 'required|type:string'],
        // Required field, array with enumeration (three fields are checked in each).
        'images' => ['required', ['id' => 'required|type:int', 'width' => 'required|type:int', 'height' => 'required|type:int']]
    ]);