<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;


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
})->name('welcome');

Route::resource('orders', OrderController::class);
Route::post('orders/search', [OrderController::class, 'search'])->name('orders.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
    Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
    Route::resource('order', OrderController::class);
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
    Route::resource('customers', CustomerController::class);
    Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('orders.update');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
  });