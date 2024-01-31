<?php
Route::get('/page/{controller}/{method}')
    ->controller('Main<controller>Controller', 'init<method>');
