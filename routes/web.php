<?php

use App\Http\Controllers\Client\Auth\ClientLoginController;
use App\Http\Controllers\Client\Auth\ClientRegisterController;
use App\Http\Controllers\Client\ClientHomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', [ClientRegisterController::class, 'index'])->name('register');

Route::get('/', [ClientLoginController::class, 'getLogin'])->middleware('guest');
Route::get('client/login', [ClientLoginController::class, 'getLogin'])->middleware('guest')->name('client.login');
Route::post('client/login', [ClientLoginController::class, 'postLogin']);
Route::get('client/logout', [ClientLoginController::class, 'logout'])->name('client.logout');
Route::group(['prefix' => 'client', 'middleware' => ['auth:client']], function () {
    Route::get('/home', [ClientHomeController::class, 'index'])->name('pelanggan.home.index');
});