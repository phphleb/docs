<?php
Route::toGroup()
    ->middleware(FirstGeneralMiddleware::class)
    ->middleware(SecondGeneralMiddleware::class);

    Route::get('/example', '...')->middleware(GetMiddleware::class);
    Route::post('/example', '...')->middleware(PostMiddleware::class);

Route::endGroup();
