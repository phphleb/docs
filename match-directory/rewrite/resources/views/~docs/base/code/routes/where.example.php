<?php
Route::toGroup()
    ->prefix('/{lang}/')
    ->where(['lang' => '[a-z]{2}']);

    Route::post('/profile/{user}/{id}', '...')
        ->where(['user' => '/[a-z]+/i', 'id' => '[0-9]+']);

Route::endGroup();
