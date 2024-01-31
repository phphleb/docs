<?php
Route::get('/api/users/{id}')->controller(UserController::class, 'getOne');