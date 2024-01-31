<?php
use App\Middlewares\Hlogin\Registrar;
use Phphleb\Hlogin\App\RegType;

Route::toGroup()->middleware(Registrar::class, data: [RegType::UNDEFINED_USER, '>=']);
// Routes in this group will be available to all unregistered and registered users
// except those that were marked deleted and banned.
Route::endGroup();

Route::toGroup()->middleware(Registrar::class, data: [RegType::PRIMARY_USER, '>=']);
// Routes in this group will be available to those who pre-registered (but didn't confirm E-mail),
// as well as to all registered users (including administrators).
Route::endGroup();

Route::toGroup()->middleware(Registrar::class, data: [RegType::REGISTERED_USER, '>=']);
// Routes in this group will be available to all users who have completed full registration
// (confirmed by E-mail including administrators).
Route::endGroup();

Route::toGroup()->middleware(Registrar::class, data: [RegType::REGISTERED_COMMANDANT, '>=']);
// Routes in this group will be available only to administrators.
Route::endGroup();

Route::toGroup()->middleware(Registrar::class, data: [RegType::PRIMARY_USER, '>=', Registrar::NO_PANEL]);
// Routes with check registration without displaying standard panels and buttons.
Route::endGroup();

Route::toGroup()->middleware(Registrar::class, data: [RegType::PRIMARY_USER, '>=', Registrar::NO_BUTTON]);
// Routes with check registration without displaying standard buttons.
Route::endGroup();