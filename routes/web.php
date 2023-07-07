<?php

use App\Http\Controllers\Client\Auth\ClientLoginController;
use App\Http\Controllers\Client\Auth\ClientRegisterController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ClientSearchController;
use App\Http\Controllers\Client\ClientViewController;
use App\Http\Controllers\Client\ClientTransactionController;
use App\Http\Controllers\Servicer\Auth\ServicerLoginController;
use App\Http\Controllers\Servicer\Auth\ServicerRegisterController;
use App\Http\Controllers\Servicer\ServicerDashboardController;
use App\Http\Controllers\Servicer\ServicerServiceController;
use App\Http\Controllers\Servicer\ServicerTransactionController;
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
Route::get('/search', [ClientSearchController::class, 'index'])->name('client.search');
Route::post('/search', [ClientSearchController::class, 'search'])->name('client.search.process');
Route::get('/search/{category}', [ClientSearchController::class, 'searchCategory'])->name('client.search.category');
Route::get('/view/{id_svc}', [ClientViewController::class, 'index'])->name('client.service.view');
Route::post('/transaction', [ClientTransactionController::class, 'index'])->name('client.transaction.post');
Route::post('/transaction/pay', [ClientTransactionController::class, 'pay'])->name('client.transaction.pay');

// Route::get('/transaction/client-information', function () {
//     return view('client.transaction.index');
// });
Route::group(['prefix' => '/', 'middleware' => ['auth:client']], function () {
    Route::get('/account/info', function () {
        return view('client.account.accountinfo.index');
    });
});
//

//Servicer

//Client
Route::get('/servicer/register', [ServicerRegisterController::class, 'index'])->name('servicer.register');
Route::post('/register-process', [ServicerRegisterController::class, 'process'])->name('servicer.register.process');

// Route::get('/servicer', [ClientHomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/servicer/login', [ServicerLoginController::class, 'getLogin'])->middleware('guest')->name('servicer.login');
Route::post('/servicer/login', [ServicerLoginController::class, 'postLogin'])->name('servicer.login.process');
Route::get('/servicer/logout', [ServicerLoginController::class, 'logout'])->name('servicer.logout');
Route::group(['prefix' => '/servicer', 'middleware' => ['auth:servicer']], function () {
    Route::get('/dashboard', [ServicerDashboardController::class, 'index'])->name('servicer.dashboard');
    Route::get('/feedback', [ServicerDashboardController::class, 'getFeedback']);
    Route::get('/services', [ServicerServiceController::class, 'index'])->name('servicer.service');
    Route::get('/services-create', [ServicerServiceController::class, 'getCreate'])->name('servicer.service.create');
    Route::post('/services-create', [ServicerServiceController::class, 'create'])->name('servicer.service.create.process');
    Route::get('/services-delete/{id_svc}', [ServicerServiceController::class, 'delete'])->name('servicer.service.delete');
    Route::get('/services-update-{id_svc}', [ServicerServiceController::class, 'getUpdate'])->name('servicer.service.update');
    Route::post('/services-update-process', [ServicerServiceController::class, 'edit'])->name('servicer.service.edit.process');
    Route::get('/transaction', [ServicerTransactionController::class, 'index'])->name('servicer.transaction');
    Route::get('/transaction-{id_transaction}', [ServicerTransactionController::class, 'UpdateStatusToProcess'])->name('servicer.transaction.update.process');
    // route::get('/transactions', function () {
    //     return view('servicer.transaction.index');
    // });
});
//