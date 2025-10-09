<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GymController,
    AuthController,
    MenuController,
    UserController,
    AboutController,
    AdminController,
    TopupController,
    ProfileController,
    ReservationController,
    CheckoutController,
    DashboardController,
    RoleController,
    KelolaUserController
};

// -----------------------------
// Public Routes
// -----------------------------
Route::get('/anjay', fn() => view('welcome'));
Route::get('/', fn() => view('IntroWebsite.index'))->name('home');
Route::get('/index', fn() => view('IntroWebsite.index'));

// -----------------------------
// Gym & Reservation
// -----------------------------
Route::get('/gyms', [GymController::class, 'index'])->name('gym.index');
Route::post('/gym/store', [GymController::class, 'store'])->name('gym.store');
Route::get('/gym/search', [GymController::class, 'search'])->name('gym.search');
Route::get('/gym/list', [GymController::class, 'list'])->name('gym.list');
Route::get('/gym/{id}', [GymController::class, 'show'])->name('gym.show');
Route::get('/gym/{id}/edit', [GymController::class, 'edit'])->name('gym.edit');
Route::post('/gym/edit/{id}', [GymController::class, 'update'])->name('gym.update');

Route::get('/reservations/view', [ReservationController::class, 'index'])->name('reservation.index');
Route::get('/gym/reservasi', [ReservationController::class, 'views'])->name('gym.reservasi');

// -----------------------------
// Profile & Topup
// -----------------------------
Route::resource('profile', ProfileController::class);
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit.id'); // custom edit route
Route::get('/topup', [TopupController::class, 'showTopUpForm'])->name('topup.form');
Route::post('/processtopup', [TopupController::class, 'processTopUp'])->name('topup.process');
Route::get('/transaksi', [ProfileController::class, 'transaksi'])->name('profile.transaksi');

// -----------------------------
// About Page
// -----------------------------
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// -----------------------------
// Checkout (protected)
// -----------------------------
Route::middleware('auth')->post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// -----------------------------
// Auth Routes
// -----------------------------
Route::get('/register', [AuthController::class, 'TampilanRegistrasi'])->name('register.form');
Route::post('/register', [AuthController::class, 'Registrasi'])->name('register.save');
Route::get('/login', [AuthController::class, 'TampilanLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// -----------------------------
// Dashboard Routes
// -----------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/login', [DashboardController::class, 'index'])->name('dashboard.login');
Route::get('/tentangkami', [AboutController::class, 'index'])->name('about.tentangkami');

// -----------------------------
// Protected Routes (auth required)
// -----------------------------
Route::middleware(['auth'])->group(function () {

    // ---- USER ROLE 1 ----
    Route::middleware(['role:1'])->group(function () {
        Route::get('/request-gym', [UserController::class, 'showGymRequestForm'])->name('user.request.gym');
        Route::post('/submit-gym-request', [UserController::class, 'submitGymRequest'])->name('user.submit.gym');
        Route::get('/user-detail', [UserController::class, 'userDetail'])->name('user.detail');
    });

    // ---- ADMIN ROLE 2 ----
    Route::middleware(['role:2'])->group(function () {
        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/approve-gym/{user}', [AdminController::class, 'approveGym'])->name('admin.gym.approve');
        Route::post('/admin/reject-gym/{user}', [AdminController::class, 'rejectGym'])->name('admin.gym.reject');
        Route::get('/admin/user-detail/{id_role}', [AdminController::class, 'userDetail'])->name('admin.user.detail.id');
        
        // Resource controllers for admin
        Route::resource('role', RoleController::class);
        Route::resource('user', KelolaUserController::class);
        Route::resource('menu', MenuController::class);
    });
});
