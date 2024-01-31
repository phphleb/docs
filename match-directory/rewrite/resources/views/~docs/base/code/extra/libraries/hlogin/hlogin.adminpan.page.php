<?php
use App\Middlewares\Hlogin\Registrar;
use Phphleb\Hlogin\App\RegType;

Route::toGroup()->middleware(Registrar::class, data: [RegType::REGISTERED_COMMANDANT, '=']);
    // Routes in this group will only be available to administrators.
Route::endGroup();