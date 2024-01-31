<?php
use Modules\Example\Controllers\ExampleModuleController;

Route::any('/demo-module')->module('example', ExampleModuleController::class, 'index');