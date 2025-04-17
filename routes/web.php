<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintController;
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

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['checkRole:admin']], function() {
        Route::resource('admin',AdminController::class)->except('show');
        Route::get('admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');

    });

    Route::group(['middleware' => ['checkRole:user']], function() {
        Route::resource('user',UserController::class)->except('show');
        Route::post('user/transfer', [UserController::class, 'transfer'])->name('user.transfer');
        Route::post('user/top-up', [UserController::class, 'topUp'])->name('user.topUp');
        Route::post('user/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');
    });

    Route::group(['middleware' => ['checkRole:bank']], function() {
        Route::resource('bank',BankController::class)->except('show');
        Route::post('bank/top-up', [BankController::class, 'topUp'])->name('bank.topUp');
        Route::post('bank/withdraw', [BankController::class, 'withdraw'])->name('bank.withdraw');
        Route::get('bank/riwayat', [BankController::class, 'riwayat'])->name('bank.riwayat');
        Route::get('bank/akun', [BankController::class, 'akun'])->name('bank.akun');
    });

    Route::resource('transactions', TransactionController::class)->except(['edit', 'update', 'destroy','show']);

    Route::put('/transactions/konfirmasi/{id}', [TransactionController::class, 'konfirmasi'])->name('transactions.konfirmasi');

    Route::get('print-single/{id}', [PrintController::class, 'printSingle'])->name('print-single');
    Route::get('print-all', [PrintController::class, 'printAll'])->name('print-all');

});



