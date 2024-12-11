<?php
Route::any('/page/{name}', preview('Current route {{route}}, request parameter {%name%}, request method {{method}}'));

Route::get('/api-address', preview('Your IP address {{ip}}'));
