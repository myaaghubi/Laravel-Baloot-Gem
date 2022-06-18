<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GemController;
use App\Http\Controllers\GemTransactionController;

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
})->name('home');

Route::get('/gem', [GemController::class, 'index'])->name('gem.index');
Route::get('/gem/{userId}', [GemController::class, 'show'])->name('gem.show');

Route::get('/gem/transactions/user/{userId}', [GemTransactionController::class, 'index'])->name('gem.transaction.index');
Route::get('/gem/transactions/{id}', [GemTransactionController::class, 'show'])->name('gem.transaction.show');
