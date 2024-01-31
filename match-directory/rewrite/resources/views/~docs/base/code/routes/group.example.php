<?php
Route::toGroup()->prefix('example');

    // /example/first/page/
    Route::get('first/page', 'First page content');
    // /example/second/page/
    Route::get('second/page', 'Second page content');

Route::endGroup();
