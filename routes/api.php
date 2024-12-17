<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::get('/checkout/notification', [CheckoutController::class, 'notification'])->name('checkout.notification');
