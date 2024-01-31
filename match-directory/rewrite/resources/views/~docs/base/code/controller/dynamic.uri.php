<?php
use App\Controllers\DefaultController;

Route::get('/resource/{version}/{page?}/')
    ->where(['version' => '[0-9]+', 'page' => '[a-z]+'])
    ->controller(DefaultController::class, 'resource');
