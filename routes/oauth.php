<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    /** Google OAuth routes */
    Route::get('/auth/google/redirect', [GoogleController::class, 'handleGoogleRedirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    /** Facebook OAuth routes */
    Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleFacebookRedirect'])->name('auth.facebook.redirect');
    Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
});