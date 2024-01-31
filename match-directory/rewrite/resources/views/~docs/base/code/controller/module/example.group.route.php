<?php

use Modules\MainProduct\{
    FirstFeature\Controllers\ModuleGetController,
    FirstFeature\Controllers\ModulePostController,
    SecondFeature\Controllers\ModuleController,
    SecondFeature\Middlewares\ModuleMiddleware,
};

Route::get('/demo-group-module/first')
    ->module('main-product/first-feature', ModuleGetController::class);

Route::post('/demo-group-module/first')
    ->module('main-product/first-feature', ModulePostController::class);

Route::any('/demo-group-module/second')
    ->module('main-product/second-feature', ModuleController::class)
    ->middleware(ModuleMiddleware::class);
