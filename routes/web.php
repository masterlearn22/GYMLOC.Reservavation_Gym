<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;

Route::get('/anjay', function () {
    return view('welcome');
});


// Route untuk AuthController (Login, Logout, Register)
Route::post('/simpanregist', [AuthController::class, 'Registrasi']);
Route::get('/register', [AuthController::class, 'TampilanRegistrasi']);
Route::post('/simpanlogin', [AuthController::class, 'login']);
Route::get('/', [AuthController::class, 'Tampilanlogin']);
Route::get('/login', [AuthController::class, 'Tampilanlogin']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('menu', MenuController::class);