<?php

use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/**
 * 'web' middleware applied to all routes
 *
 * @see \App\Providers\Route::mapWebRoutes
 */

Livewire::setScriptRoute(function ($handle) {
    $base = request()->getBasePath();
    return Route::get($base . '/vendor/livewire/livewire/dist/livewire.min.js', $handle);
});

// Route pour afficher la page d'index
Route::get('/', [CustomController::class, 'showIndex'])->name('auth.custom.index');

// Route pour la page de login
Route::get('/login', [CustomController::class, 'showLogin'])->name('auth.custom.login');

// Route pour la page d'inscription
Route::get('/register', [CustomController::class, 'showRegister'])->name('auth.custom.register');

// Route pour soumettre le formulaire d'inscription
Route::post('/register', [CustomController::class, 'handleRegister'])->name('auth.custom.register.submit');
