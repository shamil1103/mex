<?php

// use App\Http\Controllers\AuthController;

use App\Http\Controllers\BankDepositController;
use App\Http\Controllers\BkashDepositController;
use App\Http\Controllers\CashDepositController;
use App\Http\Controllers\ExpenseCatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketingexpenseController;
use App\Http\Controllers\MobileBankingDepositController;
use App\Http\Controllers\OfficeexpenseController;
use App\Http\Controllers\OthersLoanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffLoanController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/config/clear', function () {
    return \Illuminate\Support\Facades\Artisan::call('config:cache');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('pages.home');


    Route::get('/expenseCats', [ExpenseCatController::class, 'index'])->name('expenseCat.index');
    Route::post('/expenseCats', [ExpenseCatController::class, 'store'])->name('expenseCat.store');

    Route::get('/officeexpenses', [OfficeexpenseController::class, 'index'])->name('officeexpense.index');
    Route::post('/officeexpenses', [OfficeexpenseController::class, 'store'])->name('officeexpense.store');

    Route::get('/marketingexpenses', [MarketingexpenseController::class, 'index'])->name('marketingexpense.index');
    Route::post('/marketingexpenses', [MarketingexpenseController::class, 'store'])->name('marketingexpense.store');

    Route::get('/othersloans', [OthersLoanController::class, 'index'])->name('othersloan.index');
    Route::post('/othersloans', [OthersLoanController::class, 'store'])->name('othersloan.store');


    Route::delete('staff/delete', [StaffController::class, 'delete'])->name('staff.delete');
    Route::resource('staff', StaffController::class);

    Route::delete('staff-loan/delete', [StaffLoanController::class, 'delete'])->name('staff-loan.delete');
    Route::resource('staff-loan', StaffLoanController::class);

    Route::delete('cash-deposit/delete', [CashDepositController::class, 'delete'])->name('cash-deposit.delete');
    Route::resource('cash-deposit', CashDepositController::class);

    Route::delete('bank-deposit/delete', [BankDepositController::class, 'delete'])->name('bank-deposit.delete');
    Route::resource('bank-deposit', BankDepositController::class);

    Route::delete('mobile-banking-deposit/delete', [MobileBankingDepositController::class, 'delete'])->name('mobile-banking-deposit.delete');
    Route::resource('mobile-banking-deposit', MobileBankingDepositController::class);

    // Route::get('/bankdeposits', [BankDepositController::class, 'index'])->name('bankdeposit.index');
    // Route::post('/bankdeposits', [BankDepositController::class, 'store'])->name('bankdeposit.store');

    // Route::get('/bkashdeposits', [BkashDepositController::class, 'index'])->name('bkashdeposit.index');
    // Route::post('/bkashdeposits', [BkashDepositController::class, 'store'])->name('bkashdeposit.store');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/register', [AuthController::class, 'register'])->name('register');
//     Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [HomeController::class, 'index']);
//     Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
// });

require __DIR__ . '/auth.php';
