<?php

namespace App;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarRuangController;
use App\Http\Controllers\DaftarPinjamController;
use App\Http\Controllers\DashboardRentController;
use App\Http\Controllers\DashboardRoomController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\TemporaryRentController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index', [
        'title' => "Home",
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/overview', function () {
        return view('/dashboard/overview/index', [
            'title' => "Dashboard Admin",
        ]);
    });

    Route::middleware(['checkRole'])->group(function () {
        Route::get('/dashboard/temporaryRents', [TemporaryRentController::class, 'index']);
        Route::get('/dashboard/temporaryRents/{id}/acceptRents', [TemporaryRentController::class, 'acceptRents']);
        Route::get('/dashboard/temporaryRents/{id}/declineRents', [TemporaryRentController::class, 'declineRents']);
        Route::resource('dashboard/rents', DashboardRentController::class);
        Route::resource('dashboard/rooms', DashboardRoomController::class);
        Route::resource('dashboard/users', DashboardUserController::class);
        Route::resource('dashboard/admin', DashboardAdminController::class);
        Route::resource('/daftarpinjam', DashboardRentController::class);
        Route::get('dashboard/rents/{id}/endTransaction', [DashboardRentController::class, 'endTransaction']);
        Route::get('dashboard/users/{id}/makeAdmin', [DashboardUserController::class, 'makeAdmin']);
        Route::get('dashboard/admin/{id}/removeAdmin', [DashboardAdminController::class, 'removeAdmin']);
    });

    Route::resource('/daftarpinjam', DashboardRentController::class);
    Route::get('/daftarruang', [DaftarRuangController::class, 'index']);
    Route::get('/showruang/{room:code}', [DaftarRuangController::class, 'show']);
    Route::get('/daftarpinjam', [DaftarPinjamController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);

});
