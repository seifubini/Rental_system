<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ItemController;

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

/**Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/dashboard', DashboardController::class);
Route::resource('/warehouse', WarehouseController::class);
Route::resource('/items', ItemController::class);
