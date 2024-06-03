<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ParkingStatusController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\HomeController;

Route::resource('parking-spaces', ParkingSpaceController::class);
Route::resource('bookings', BookingController::class);
Route::resource('parking-statuses', ParkingStatusController::class);
Route::resource('qr-codes', QRCodeController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/myrsv', function () {
    return view('myrsv');
})->middleware(['auth', 'verified'])->name('myrsv');

Route::get('/booking', function () {
    return view('booking');
})->middleware(['auth', 'verified'])->name('booking');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin.dashboard', [HomeController::class,'index']);