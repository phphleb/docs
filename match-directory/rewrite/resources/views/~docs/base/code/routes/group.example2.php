<?php
Route::toGroup()
    ->prefix('example')
    ->group(function () {
        // /example/first/page/
        Route::get('first/page', 'First page content');
        // /example/second/page/
        Route::get('second/page', 'Second page content');
    });
