<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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
    return redirect()->route('login');
});

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/transaction/search', [TransactionController::class, 'transactionSearch'])->name('search');
    Route::resources([
        'product' => ProductController::class,
        'transaction' => TransactionController::class,
    ]);
});

Route::post('getProduk', [ProductController::class, 'getProduk'])->name('getProduk');
Route::post('getTransaksi', [TransactionController::class, 'getTransaksi'])->name('getTransaksi');
Route::post('getIncome', [TransactionController::class, 'getIncome'])->name('getIncome');
