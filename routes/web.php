<?php

use App\Http\Controllers\Client\Auth\ClientLoginController;
use App\Http\Controllers\Client\Auth\ClientRegisterController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ClientSearchController;
use App\Http\Controllers\Client\ClientViewController;
use App\Http\Controllers\Client\ClientTransactionController;
use App\Http\Controllers\Client\ClientAccountController;

use App\Http\Controllers\Servicer\Auth\ServicerLoginController;
use App\Http\Controllers\Servicer\Auth\ServicerRegisterController;
use App\Http\Controllers\Servicer\ServicerDashboardController;
use App\Http\Controllers\Servicer\ServicerServiceController;
use App\Http\Controllers\Servicer\ServicerTransactionController;
use App\Http\Controllers\Servicer\ServicerAccountController;
use App\Http\Controllers\Servicer\ServicerBillingController;
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

// Route::get('/token', function () {
//     return csrf_token();
// });
// //Client
Route::get('/register', [ClientRegisterController::class, 'index'])->name('register');
Route::post('/register-process', [ClientRegisterController::class, 'process'])->name('client.register.process');

Route::get('/', [ClientHomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/login', [ClientLoginController::class, 'getLogin'])->middleware('guest')->name('client.login');
Route::post('/login', [ClientLoginController::class, 'postLogin'])->name('client.login.process');
Route::get('/logout', [ClientLoginController::class, 'logout'])->name('client.logout');
Route::get('/search', [ClientSearchController::class, 'index'])->name('client.search');
Route::post('/search', [ClientSearchController::class, 'search'])->name('client.search.process');
Route::get('/search/{category}', [ClientSearchController::class, 'searchCategory'])->name('client.search.category');


// Route::get('/transaction/client-information', function () {
//     return view('client.transaction.index');
// });
Route::group(['prefix' => '/client', 'middleware' => ['auth:client']], function () {
    Route::get('/view-{id_svc}', [ClientViewController::class, 'index'])->name('client.service.view');
    Route::get('/transactionlist', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction');
    Route::get('/transactionlist-paid', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.paid');
    Route::get('/transactionlist-pending', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.pending');
    Route::get('/transactionlist-process', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.process');
    Route::get('/transactionlist-finished', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.finished');
    Route::get('/transactionlist-rejected', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.rejected');
    Route::get('/transactionlist-accepted', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.accepted');
    Route::get('/transactionlist-canceled', [ClientTransactionController::class, 'transactionlist'])->name('client.transaction.canceled');
    Route::post('/transaction-process-{id_transaction}', [ClientTransactionController::class, 'UpdateStatusToProcess'])->name('client.transaction.update.process');
    Route::post('/transaction-cancel-{id_transaction}', [ClientTransactionController::class, 'UpdateStatusToCancel'])->name('client.transaction.update.cancel');
    Route::post('/transaction-finish-{id_transaction}', [ClientTransactionController::class, 'UpdateStatusToFinish'])->name('client.transaction.update.finished');
    Route::post('/transaction-pay', [ClientTransactionController::class, 'pay'])->name('client.transaction.pay');
    Route::get('/transaction-pay-fromlist-{row}', [ClientTransactionController::class, 'payFromlist'])->name('client.transaction.pay.fromlist');
    Route::get('/transactionlist-spec', [ServicerTransactionController::class, 'spec'])->name('client.transaction.spec');
    Route::post('/transaction', [ClientTransactionController::class, 'index'])->name('client.transaction.post');
    Route::get('/account-center', [ClientAccountController::class, 'index'])->name('client.accountcenter');
    Route::post('/account-center/process', [ClientAccountController::class, 'edit'])->name('client.accountcenter.edit');

    Route::get('/transaction-afterpay', [ClientTransactionController::class, 'afterpay'])->name('client.transaction.afterpay');
    // Route::get('/account-center', function () {
    //     return view('client.account.accountcenter.index');
    // });
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
    Route::get('/transaction-paid', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.paid');
    Route::get('/transaction-pending', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.pending');
    Route::get('/transaction-process', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.process');
    Route::get('/transaction-finished', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.finished');
    Route::get('/transaction-rejected', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.rejected');
    Route::get('/transaction-accepted', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.accepted');
    Route::get('/transaction-canceled', [ServicerTransactionController::class, 'index'])->name('servicer.transaction.canceled');
    Route::post('/transaction-finish-{id_transaction}', [ServicerTransactionController::class, 'UpdateStatusToFinish'])->name('servicer.transaction.update.finished');
    Route::post('/transaction-accept-{id_transaction}', [ServicerTransactionController::class, 'UpdateStatusToAccept'])->name('servicer.transaction.update.accepted');
    Route::post('/transaction-reject-{id_transaction}', [ServicerTransactionController::class, 'UpdateStatusToReject'])->name('servicer.transaction.update.rejected');
    Route::get('/account-center', [ServicerAccountController::class, 'index'])->name('servicer.accountcenter');
    Route::post('/account-center/process', [ServicerAccountController::class, 'edit'])->name('servicer.accountcenter.edit');
    Route::get('/billing', [ServicerBillingController::class, 'index'])->name('servicer.billing');
    Route::post('/billing-verify', [ServicerBillingController::class, 'verify'])->name('servicer.billing.verify');
    Route::post('/billing-withdraw', [ServicerBillingController::class, 'withdraw'])->name('servicer.billing.withdraw');
    // Route::get('/billing', function () {
    //     return view('servicer.billing.index');
    // });
});
//