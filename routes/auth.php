<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Validation\Rules\Email;

Route::middleware('guest')->group(function () {
    // --- Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // --- Login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store']);
    
    

});

Route::middleware('auth')->group(function () {
    // --- Logout
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    // --- Verify email
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])->middleware(['signed'])->name('verification.verify');
    
    Route::post('/email/verification-notification',[EmailVerificationController::class, 'resend'] )->middleware([ 'throttle:6,1'])->name('verification.send');
}); 