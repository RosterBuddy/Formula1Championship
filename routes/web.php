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
    return redirect(route('dashboard'));
});

Auth::routes();

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('standings/drivers', [App\Http\Controllers\StandingsController::class, 'driver_standings'])->name('driver_standings');
Route::get('standings/teams', [App\Http\Controllers\StandingsController::class, 'team_standings'])->name('team_standings');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth']
], function() {
    Route::get('race/manage', [App\Http\Controllers\AdminController::class, 'race_overview'])->name('race_overview');
    Route::get('race/create', [App\Http\Controllers\AdminController::class, 'race_create'])->name('race_create');
    Route::post('race/store', [App\Http\Controllers\AdminController::class, 'race_store'])->name('race_store');
    Route::get('race/show/{id}', [App\Http\Controllers\AdminController::class, 'race_show'])->name('race_show');

    //Race Results
    Route::get('race/results/{id}', [App\Http\Controllers\AdminController::class, 'race_results'])->name('race_results');
    Route::post('race/results/{id}/insert', [App\Http\Controllers\AdminController::class, 'insert_race_results'])->name('insert_race_results');

    ////Drivers
    Route::get('drivers', [App\Http\Controllers\AdminController::class, 'drivers_overview'])->name('drivers_overview');
    Route::get('drivers/create', [App\Http\Controllers\AdminController::class, 'drivers_create'])->name('drivers_create');
    Route::post('drivers/create/store', [App\Http\Controllers\AdminController::class, 'drivers_store'])->name('drivers_store');
    Route::get('drivers/show/{id}', [App\Http\Controllers\AdminController::class, 'drivers_show'])->name('drivers_show');
    Route::post('drivers/update/{id}', [App\Http\Controllers\AdminController::class, 'drivers_update'])->name('drivers_update');
});