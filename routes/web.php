<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TopupController;

Route::get('/anjay', function () {
    return view('welcome');
});

//Dashboard Page
Route::get('/', function () {
    return view('IntroWebsite.index');
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
Route::middleware(['auth', 'role:1'])->get('/request-gym', [UserController::class, 'showGymRequestForm'])->name('request.gym');
Route::middleware(['auth', 'role:1'])->post('/submit-gym-request', [UserController::class, 'submitGymRequest'])->name('submit.gym.request');
Route::middleware(['auth', 'role:3'])->get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware(['auth', 'role:3'])->post('/admin/approve-gym/{user}', [AdminController::class, 'approveGym'])->name('admin.approve.gym');
Route::middleware(['auth', 'role:3'])->post('/admin/reject-gym/{user}', [AdminController::class, 'rejectGym'])->name('admin.reject.gym');
Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('/admin/user/{id}/detail', [AdminController::class, 'userDetail'])
         ->name('admin.user.detail');
});

Route::middleware(['auth'])->group(function () { 
    Route::resource('profile', ProfileController::class);
});
Route::get('/profile/topup', [TopupController::class, 'showTopUpForm'])->name('profile.topup');
Route::post('/profile/topup', [TopupController::class, 'processTopUp']);
Route::get('/profile/transaksi', [TransaksiController::class, 'index'])->name('profile.transaksi');
Route::get('/transaction/{id}', [TransaksiController::class, 'show'])->name('transaction.details');

Route::get('/gym/edit/{gym_id}', [GymController::class, 'edit'])->name('pihakgym.edit');
Route::post('/gym/edit/{gym_id}', [GymController::class, 'update'])->name('pihakgym.update');
Route::resource('profile', ProfileController::class);

Route::get('/gym/search', [GymController::class, 'search'])->name('gym.search');
Route::get('/gym/list', [GymController::class, 'list'])->name('gym.list');
Route::get('/gym/detail/{id}', [GymController::class, 'show'])->name('gym.detail');
