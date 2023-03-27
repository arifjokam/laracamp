<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashbord;
use App\Http\Controllers\Admin\DashboardController as AdminDashbord;

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
    return view('welcome');
})->name('welcome');


// Socialite routes
Route::get('sign-in-google', [UserControler::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserControler::class, 'handleProviderCallback'])->name('user.google.callback');


// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        // checkout routes
        Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
        Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
        Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
        
        // user dashboard
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        // Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');

        // user Dashboard
        Route::prefix('user/dashboard')->namespace('user')->name('user.')->group(function(){
            Route::get('/', [UserDashbord::class, 'index'])->name('dashboard');
        });
        // Admin Dashboard
        Route::prefix('admin/dashboard')->namespace('admin')->name('admin.')->group(function(){
            Route::get('/', [AdminDashbord::class, 'index'])->name('dashboard');
        });

});

require __DIR__.'/auth.php';
