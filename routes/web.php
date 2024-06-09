<?php

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSpaceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ParkingStatusController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SummonController;

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

route::get('admin.dashboard', [HomeController::class,'index'])->middleware(['auth', 'admin']);


Route::get('admin.parkingmanage', function () {
    return view('admin.parkingmanage');
})->middleware(['auth', 'admin'])->name('parkingmanage');

Route::get('admin.usermanage', function () {
    return view('admin.usermanage');
})->middleware(['auth', 'admin'])->name('usermanage');

Route::get('admin.summonmanage', function () {
    return view('admin.summonmanage');
})->middleware(['auth', 'admin'])->name('summonmanage');

Route::get('admin.dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

// Summon
Route::get('/summonmanage', [SummonController::class, 'list']);
Route::get('admin/add-summon', [SummonController::class, 'add']);
Route::post('admin/add-summon', [SummonController::class, 'insert'])->name('add-summon');
//Route::get('admin/edit-user/{id}', [UserController::class, 'edit']);
//Route::post('admin/edit-user/{id}', [UserController::class, 'update']);
//Route::get('admin/delete-user/{id}', [UserController::class, 'delete']);

// Users
Route::get('admin/usermanage', [UserController::class, 'list']);
Route::get('admin/add-user', [UserController::class, 'add']);
Route::post('admin/add-user', [UserController::class, 'insert'])->name('add-user');
//Route::get('admin/edit-user/{id}', [UserController::class, 'edit']);
//Route::post('admin/edit-user/{id}', [UserController::class, 'update']);
//Route::get('admin/delete-user/{id}', [UserController::class, 'delete']);


//Parking
Route::get('/parkingmanage', [ParkingController::class, 'loadAllParking']);