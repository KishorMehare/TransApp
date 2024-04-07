<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
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
    return view('welcome');
});

Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('/', function () {
    return view('agent.dashboard');
})->middleware(['auth', 'role:agent'])->name('agent.dashboard');

// Route::get('/agent/dashboard', function () {
//     return view('agent.dashboard');
// })->middleware(['auth', 'role:agent'])->name('agent.dashboard');

// Route::get('/vehicles', [\App\Http\Controllers\VehiclesController::class, 'edit'])->middleware(['auth', 'role:agent'])->name('vehicles.edit'); 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('admin/register', [RegisteredUserController::class, 'store']);
    Route::get('/admin/users', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/admin/profile/{id}', [ProfileController::class, 'companyuseredit'])->name('profile.companyuseredit');
    // Route::get('/profile/}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/companyuserupdate', [ProfileController::class, 'companyuserupdate'])->name('profile.companyuserupdate');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('/admin/agency', \App\Http\Controllers\TruckCompanyController::class)
->only(['index', 'create', 'store', 'destroy'])
->middleware(['auth','role:admin']);

Route::resource('bookings', BookingController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth','role:agent']);

Route::resource('/vehicles', \App\Http\Controllers\VehiclesController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth','role:agent']);

Route::resource('/customer', \App\Http\Controllers\CustomerController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth','role:agent']);

Route::resource('/drivers', \App\Http\Controllers\DriverController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth','role:agent']);

Route::get('/vehiclesonmap', '\App\Http\Controllers\VehiclesController@getVehiclePositions');

// Route::get('admin/register', [RegisteredUserController::class, 'create'])
//                 ->name('register')->middleware(['auth','role:admin']);
// Route::post('admin/register', [RegisteredUserController::class, 'store']);

require __DIR__.'/auth.php';
