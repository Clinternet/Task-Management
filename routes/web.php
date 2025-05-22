<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Products;
use App\Livewire\Cart; 
use App\Livewire\Home;
use App\Livewire\BillingPage;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/register', function () {
    return view('livewire.reg');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkrole:customer'])->group(function () {
        Route::get('/home', Home::class)->name('/home');
        Route::get('/cart', Cart::class)->name('/cart');
        Route::get('/billing', BillingPage::class)->name('billing.page');

        Route::get('/cart/remove/{productId}', [Cart::class, 'removeFromCart'])->name('cart.remove');
        Route::get('/purchase', \App\Livewire\PurchasePage::class)->name('purchase.page');
    });

    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard'); // Changed to '/dashboard'
        Route::get('/products', Products::class)->name('products');
    });
});



Route::post('/', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
})->name('logout');