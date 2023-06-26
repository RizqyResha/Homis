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
Route::post('/register-process', [ClientRegisterController::class, 'process'])->name('client.register.process');

Route::get('/', [ClientHomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/login', [ClientLoginController::class, 'getLogin'])->middleware('guest')->name('client.login');
Route::post('/login', [ClientLoginController::class, 'postLogin'])->name('client.login.process');
Route::get('/logout', [ClientLoginController::class, 'logout'])->name('client.logout');
Route::get('/home', [ClientHomeController::class, 'index'])->name('pelanggan.home.index');
Route::group(['prefix' => '/', 'middleware' => ['auth:client']], function () {

});