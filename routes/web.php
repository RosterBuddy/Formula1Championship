<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth']
], function() {
    Route::get('race/manage', [App\Http\Controllers\AdminController::class, 'race_overview'])->name('race_overview');
    Route::get('race/create', [App\Http\Controllers\AdminController::class, 'race_create'])->name('race_create');
    Route::post('race/store', [App\Http\Controllers\AdminController::class, 'race_store'])->name('race_store');
    Route::get('race/show/{id}', [App\Http\Controllers\AdminController::class, 'race_show'])->name('race_show');

    ////Drivers
    Route::get('drivers', [App\Http\Controllers\AdminController::class, 'drivers_overview'])->name('drivers_overview');
    Route::get('drivers/create', [App\Http\Controllers\AdminController::class, 'drivers_create'])->name('drivers_create');
    Route::post('drivers/create/store', [App\Http\Controllers\AdminController::class, 'drivers_store'])->name('drivers_store');
    Route::get('drivers/show/{id}', [App\Http\Controllers\AdminController::class, 'drivers_show'])->name('drivers_show');
    Route::post('drivers/update/{id}', [App\Http\Controllers\AdminController::class, 'drivers_update'])->name('drivers_update');
});