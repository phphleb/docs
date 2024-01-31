<?php

use App\Controllers\DefaultController;

Route::get('/')->controller(DefaultController::class, 'index');