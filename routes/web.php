<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::controller(InicioController::class)->group(function () {
    Route::get('/', 'index')
        ->name('inicio');
});

Route::controller(ServicioController::class)->group(function () {
    Route::get('/servicio', 'index')
        ->name('servicio');
});

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/portfolio', 'index')
        ->name('portfolio');
});
