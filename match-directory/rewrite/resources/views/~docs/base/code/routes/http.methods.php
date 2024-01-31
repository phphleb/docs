<?php
Route::options('/ajax/query/', '...')->controller(OptionsController::class);

Route::post('/ajax/query/', '{"result": "ok"}')->name('post.example.query');

