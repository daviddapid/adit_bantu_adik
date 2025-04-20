<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionContoller;
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
    return view('auth.dashboard');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerAction')->name('register.action');
    Route::post('/login', 'loginAction')->name('login.action');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);

    Route::controller(TransactionContoller::class)->prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/checkout', 'checkout')->name('checkout');
        Route::get('/history', 'history')->name('history');
        Route::get('/history/{transaction}', 'historyDetail')->name('history.detail');
    });
});
