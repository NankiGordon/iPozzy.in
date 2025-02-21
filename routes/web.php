<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PayFastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ListingController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::post('payment/create', [PayFastController::class, 'createPayment']);
Route::get('payment/return', [PayFastController::class, 'paymentReturn']);
Route::get('payment/cancel', [PayFastController::class, 'paymentCancel']);

Route::post('/user-profile', [UserProfileController::class, 'store'])->name('user_profile.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('listings', ListingController::class);
});
