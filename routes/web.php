<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/piattaforma', [LandingController::class, 'platform'])->name('platform');
Route::get('/verifica', [LandingController::class, 'verify'])->name('verify');
Route::get('/contatti', [LandingController::class, 'contact'])->name('contact');
Route::get('/in-arrivo', [LandingController::class, 'teaser'])->name('teaser'); // vecchio teaser pre-lancio
Route::post('/resta-aggiornato', [LandingController::class, 'store'])->name('lead.store');
