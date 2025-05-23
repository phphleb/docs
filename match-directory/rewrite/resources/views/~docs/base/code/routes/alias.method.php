<?php
Route::get('/user/{id}/', view('user'))->name('profile.name');
Route::alias('/profile/{id}/', 'new.profile.name', 'profile.name');

