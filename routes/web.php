<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');           // teaser pubblico
Route::get('/piattaforma', [LandingController::class, 'platform'])->name('platform'); // landing commerciale (futura)
Route::post('/resta-aggiornato', [LandingController::class, 'store'])->name('lead.store');
