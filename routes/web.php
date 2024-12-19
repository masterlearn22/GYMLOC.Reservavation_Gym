<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\KelolaUserController;

Route::get('/anjay', function () {
    return view('welcome');
});

//Dashboard Page
Route::get('/', function () {
    return view('IntroWebsite.index');
});


Route::get('/', [DashboardController::class, 'index'])->name('dasboard.index');
Route::get('/index', [DashboardController::class, 'index'])->name('dasboard.login');
Route::get('/tentangkami', [AboutController::class, 'index'])->name('about.index');
// Route untuk AuthController (Login, Logout, Register)
Route::post('/simpanregist', [AuthController::class, 'Registrasi'])->name('register');
Route::get('/login', [AuthController::class, 'Tampilanlogin']);
Route::post('/simpanlogin', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);

// Rute untuk Menu


// Rute untuk Reservasi
Route::get('/reservations/view',[ReservationController::class, 'index']);
Route::get('/gym/reservasi', [ReservationController::class, 'views'])->name('pihakgym.view');


Route::get('/index', function () {
    return view('IntroWebsite.index');
});


Route::get('/gyms', [GymController::class, 'index']);
Route::post('/gym/store', [GymController::class, 'store']);
Route::get('/gym/search', [GymController::class, 'search'])->name('gym.search');
Route::get('/gym/list', [GymController::class, 'list'])->name('gym.list');
Route::get('/gym/{id}', [GymController::class, 'show'])->name('gym.show');
Route::get('/gym/edit/{id}', [GymController::class, 'edit'])->name('gym.edit');
Route::post('/gym/edit/{id}', [GymController::class, 'update'])->name('gym.update');

// Rute untuk Profile
Route::resource('profile', ProfileController::class);
Route::get('/topup', [TopupController::class, 'showTopUpForm'])->name('topup');
Route::post('/processtopup', [TopupController::class, 'processTopUp'])->name('process.topup');
Route::get('/transaksi', [ProfileController::class, 'transaksi'])->name('transaksi');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/about/index', [AboutController::class, 'index'])->name('about.index');

// Rute untuk Transaksi
Route::get('/transaction/{id}', [TransaksiController::class, 'show'])->name('transaction.details');
// Rute untuk Checkout
Route::middleware('auth')->post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// Rute untuk Admin dan User
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:1'])->group(function () {
        Route::get('/request-gym', [UserController::class, 'showGymRequestForm'])->name('request.gym');
        Route::post('/submit-gym-request', [UserController::class, 'submitGymRequest'])->name('submit.gym.request');
        Route::get('/user-detail', [UserController::class, 'User Detail'])->name('admin.user.detail');
        
    });

    Route::middleware(['role:2'])->group(function () {
        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/approve-gym/{user}', [AdminController::class, 'approveGym'])->name('admin.approve.gym');
        Route::post('/admin/reject-gym/{user}', [AdminController::class, 'rejectGym'])->name('admin.reject.gym');
        Route::get('/user-detail/{id_role}', [AdminController::class, 'userDetail'])->name('admin.user.detail');
        Route::resource('role', RoleController::class);
        Route::resource('user', KelolaUserController::class);
        Route::resource('menu', MenuController::class);
    });

    Route::get('register', [AuthController::class, 'TampilanRegistrasi'])->name('register');
Route::post('register', [AuthController::class, 'Registrasi']);
Route::get('login', [AuthController::class, 'TampilanLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
    
});
// Menambahkan route untuk edit gym
Route::get('/gym/{id}/edit', [GymController::class, 'edit'])->name('pihakgym.edit');

