<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

Route::get('/anjay', function () {
    return view('welcome');
});

//Dashboard Page
Route::get('/', function () {
    return view('index');
});


// Route untuk AuthController (Login, Logout, Register)
Route::post('/simpanregist', [AuthController::class, 'Registrasi'])->name('register');
Route::get('/register', [AuthController::class, 'TampilanRegistrasi']);
Route::post('/simpanlogin', [AuthController::class, 'login'])->name('login');;
//Route::get('/', [AuthController::class, 'Tampilanlogin']);
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
    return view('IntroWebsite.index');
});


Route::get('/gyms', [GymController::class, 'index']);
Route::post('/gym/store', [GymController::class, 'store']);
Route::middleware(['auth', 'role:user'])->get('/request-gym', [UserController::class, 'showGymRequestForm'])->name('request.gym');
Route::middleware(['auth', 'role:user'])->post('/submit-gym-request', [UserController::class, 'submitGymRequest'])->name('submit.gym.request');
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware(['auth', 'role:admin'])->post('/admin/approve-gym/{user}', [AdminController::class, 'approveGym'])->name('admin.approve.gym');
Route::middleware(['auth', 'role:admin'])->post('/admin/reject-gym/{user}', [AdminController::class, 'rejectGym'])->name('admin.reject.gym');
Route::get('/profile/topup', [UserController::class, 'showTopUpForm'])->name('profile.topup');
Route::post('/profile/topup', [UserController::class, 'processTopUp']);

Route::get('/gym/edit/{id}', [GymController::class, 'edit'])->name('pihakgym.edit');
Route::post('/gym/edit/{id}', [GymController::class, 'update']);
Route::resource('profile', ProfileController::class);


