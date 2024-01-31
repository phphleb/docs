<?php
Route::match(['get', 'post'], '/page/{target}')
    ->controller('Main<target>[verb]Controller', '[verb]Method>');
