<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->to('login');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'edit'])->name('change-password.edit');
    Route::post('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'update'])->name('change-password.update');
    
    Route::resources([
        'users' => App\Http\Controllers\Admin\UserController::class,
        'roles' => App\Http\Controllers\Admin\RoleController::class,
    ]);
});

include 'auth.php';