<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware(['guest'])->group(function() {
  Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
  Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
  Route::post('/login', [AuthenticatedSessionController::class, 'store']);

  Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.request');
  Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.email');
  
  Route::get('/reset-password/{token}', [ResetPasswordController::class, 'edit'])->name('password.reset');
  Route::post('/reset-password/{token}', [ResetPasswordController::class, 'update'])->name('password.reset');
});

Route::middleware(['auth'])->group(function() {
  Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});