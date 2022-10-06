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
    Route::get('race/create', [App\Http\Controllers\AdminController::class, 'create_race'])->name('create_race');
    Route::post('race/store', [App\Http\Controllers\AdminController::class, 'store_race'])->name('store_race');
});