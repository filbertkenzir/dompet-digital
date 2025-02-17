<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;

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
    return view('auth/login');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});

// Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['checkRole:admin']], function() {
        Route::resource('admin',AdminController::class)->except('show');
    });
    Route::group(['middleware' => ['checkRole:user']], function() {
        Route::resource('user',UserController::class)->except('show');
    });

    Route::resource('transactions', TransactionController::class)->except(['edit', 'update', 'destroy','show']);

    Route::post('transactions/{transaction}/confirm', [TransactionController::class, 'konfirmasi'])->name('transactions.confirm')->middleware('checkRole:bank');

    Route::post('user/transfer', [UserController::class, 'transfer'])->name('user.transfer');
    Route::post('user/top-up', [UserController::class, 'topUp'])->name('user.topUp');
    Route::post('user/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');
// });



