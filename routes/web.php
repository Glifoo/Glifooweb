<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::controller(InicioController::class)->group(function () {
    Route::get('/', 'index')
        ->name('inicio');
});
