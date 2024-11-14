<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('tasks', TaskController::class);
});
