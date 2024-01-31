<?php

Route::get('/{lang}/panel/page/default')
    ->page('adminpan', ExamplePanelController::class)
    ->name('adminpan.default');