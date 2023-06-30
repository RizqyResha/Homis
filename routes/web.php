<?php

use App\Http\Controllers\Client\Auth\ClientLoginController;
use App\Http\Controllers\Client\Auth\ClientRegisterController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Servicer\Auth\ServicerLoginController;
use App\Http\Controllers\Servicer\Auth\ServicerRegisterController;
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

//Client
Route::get('/register', [ClientRegisterController::class, 'index'])->name('register');
Route::post('/register-process', [ClientRegisterController::class, 'process'])->name('client.register.process');

Route::get('/', [ClientHomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/login', [ClientLoginController::class, 'getLogin'])->middleware('guest')->name('client.login');
Route::post('/login', [ClientLoginController::class, 'postLogin'])->name('client.login.process');
Route::get('/logout', [ClientLoginController::class, 'logout'])->name('client.logout');
Route::group(['prefix' => '/', 'middleware' => ['auth:client']], function () {

});
//

//Servicer

//Client
Route::get('/servicer/register', [ServicerRegisterController::class, 'index'])->name('servicer.register');
Route::post('/register-process', [ServicerRegisterController::class, 'process'])->name('servicer.register.process');

// Route::get('/servicer', [ClientHomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/servicer/login', [ServicerLoginController::class, 'getLogin'])->middleware('guest')->name('servicer.login');
Route::post('/servicer//login', [ServicerLoginController::class, 'postLogin'])->name('servicer.login.process');
Route::get('/servicer/logout', [ServicerLoginController::class, 'logout'])->name('servicer.logout');
Route::group(['prefix' => '/servicer', 'middleware' => ['auth:servicer']], function () {
    Route::get('/dashboard', function () {
        return view('servicer.dashboard.index');
    })->name('servicer.dashboard');
});
//