<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;

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


Route::get('/reservations/view', function () {
    return view('reservations');
});
Route::get('/reservations/api', [ReservationController::class, 'index']);
Route::post('/reservations/store', [ReservationController::class, 'create']);
Route::put('/reservations/{id}/status', [ReservationController::class, 'updateStatus']);
Route::post('/reservations/{id}/payment', [ReservationController::class, 'addPayment']);


Route::get('/index', function () {
    return view('index');
});

Route::get('/gyms', [GymController::class, 'index']);
Route::post('/gym/store', [GymController::class, 'store']);
