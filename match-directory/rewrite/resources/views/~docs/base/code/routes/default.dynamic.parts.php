<?php
Route::get('/example/{first}/{second:two}/{third:three?}', 'defaults value in dynamic route');
