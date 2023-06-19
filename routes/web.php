<?php

use App\Http\Controllers\Administrator\AssetsController;
use App\Http\Controllers\Administrator\BookingController;
use App\Http\Controllers\Administrator\HomeController;
use App\Http\Controllers\Administrator\RoomController;
use App\Http\Controllers\Administrator\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Console\View\Components\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


// Route::controller(LoginController)
// Route::controller(DashboardController::class)->group(function () {
//     // Route::get('/', 'index');

// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', 'App\Http\Controllers\Administrator\HomeController@index')->name('dashboard');

    // Admin_Section
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard_admin', 'index');
        Route::get('/profile', 'view_profile');
    });

    Route::controller(RoomController::class)->group(function () {
        // View Data
        Route::get('/admin/room/list', 'index')->name('room-view');
        Route::get('/room_detail/{id}', [RoomController::class, 'view_room_detail'])->name('room.view_detail');

        // Crud Section
        Route::get('/admin/room/create', 'create')->name('room-form');
        Route::post('/admin/room/store', [RoomController::class, 'store'])->name('store_room');
        Route::get('/admin/room/edit/{id}', [RoomController::class, 'edit'])->name('edit_room');
        Route::post('/admin/room/update/{id}', [RoomController::class, 'update'])->name('update_room');
        Route::delete('/admin/room/delete/{id}', [RoomController::class, 'destroy'])->name('delete_room');

        // Adding Asset into rooms
        Route::get('/admin/room/room-asset/list', [RoomController::class, 'asset_view'])->name('room-asset');
        Route::get('/admin/room/room-asset/create', [RoomController::class, 'create_room_asset'])->name('room-asset-create');
        Route::post('/admin/room/room-asset/store', [RoomController::class, 'store_room_asset'])->name('room-asset-store');
        Route::get('/admin/room/room-asset/edit/{id}', [RoomController::class, 'edit_room_asset'])->name('room-asset-edit');
        Route::post('/admin/room/room-asset/update/{id}', [RoomController::class, 'update_room_asset'])->name('room-asset-update');
        Route::delete('/admin/room/room-asset/delete/{id}', [RoomController::class, 'destroy_room_asset'])->name('room-asset-destroy');
    });

    Route::controller(AssetsController::class)->group(function () {
        // View Data
        Route::get('/admin/assets/assets_master', 'index')->name('asset-view');

        // Crud Section
        Route::get('/admin/assets/create', 'create')->name('asset');
        Route::post('/admin/assets/store', [AssetsController::class, 'store'])->name('store_asset');
        Route::get('/admin/assets/edit/{id}', [AssetsController::class, 'edit'])->name('edit_asset');
        Route::post('/admin/assets/update/{id}', [AssetsController::class, 'update'])->name('update_asset');
        Route::delete('/admin/assets/delete/{id}', [AssetsController::class, 'destroy'])->name('delete_asset');
    });

    Route::controller(UserController::class)->group(function () {
        // View Data
        Route::get('/admin/user/list', 'index')->name('user-view');

        // Crud Section
        Route::get('/admin/user/create', 'create')->name('user-create');
        Route::post('/admin/user/store', [UserController::class, 'store'])->name('user-store');
        Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
        Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user-update');
        Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
    });

    Route::controller(BookingController::class)->group(function () {
        // View Data
        Route::get('/admin/room/booking/list', 'index')->name('room-schedule');
        Route::get('/admin/room/booking/list{id}', [BookingController::class, 'view_booking_detail'])->name('booking.view_detail');

        // Crud Section
        Route::get('/admin/room/booking/create', 'create')->name('booking-create');
        Route::post('/admin/room/booking/store', [BookingController::class, 'store'])->name('booking-store');
        // Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
        // Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user-update');
        Route::delete('/admin/room/booking/{id}', [BookingController::class, 'destroy'])->name('booking-delete');
    });

    // User Section
});
