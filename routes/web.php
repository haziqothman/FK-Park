<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ParkingStatusController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;


Route::resource('parking-spaces', ParkingSpaceController::class);
Route::resource('parking-statuses', ParkingStatusController::class);
// Route::get('/qrscanner', [QRScannerController::class, 'index'])->name('qrscanner.index');
// Route::post('/qr-details', [QRCodeController::class, 'showDetails']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::get('/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
    Route::post('/bookings/finalize', [BookingController::class, 'finalize'])->name('bookings.finalize');
    Route::get('/bookings/{booking}/show', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}', [BookingController::class, 'availableParkingSpaces'])
    ->name('bookings.availableParkingSpaces');

    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::get('/parking-spaces', [ParkingSpaceController::class, 'index'])->name('parking-spaces.index');

    Route::get('/qrcode/create', [QRCodeController::class, 'create'])->name('qrcode.create');
    Route::post('/confirm', [QRCodeController::class, 'confirm'])->name('qrcode.confirm');
    Route::get('/qrcode/index', [QRCodeController::class, 'index'])->name('qrcode.index');
    Route::get('/qrcode/form', [QRCodeController::class, 'form'])->name('qrcode.form');
    Route::post('/qrcode/store', [QRCodeController::class, 'store'])->name('qrcode.store');
    Route::resource('qrcode', QRCodeController::class);

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


