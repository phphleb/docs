<?php
Route::get('/old/address/{name}')->redirect('/new/address/{%name%}', 301);
