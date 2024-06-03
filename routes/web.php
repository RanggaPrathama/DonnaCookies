<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeratController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\DetailCookiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'login_post'])->name('loginPost');
    Route::post('/register', [AuthController::class, 'register_post'])->name('registerPost');
});



Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/homeUser', [HomeController::class, 'homeUser'])->name('homeUser');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
    Route::get('/product/{id}', [CookiesController::class, 'productCookies'])->name('productCookies');

    Route::post('/cart/create', [CartController::class, 'store'])->name('cart.store');

    Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::post('/pemesanan/create', [PemesananController::class, 'store'])->name('pemesanan.store');

    Route::get('/pemesanan/detail/{id}', [PemesananController::class, 'index'])->name('pemesanan.index');

    Route::put('/pemesanan/acc/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');

    Route::get('/pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index');

    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');

    Route::get('/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');

    Route::post('/reviiew/{id}',[HomeController::class,'review'])->name('reviewcreate');

    //Route::get('/register')



    /*===================== ADMIN =====================*/

    Route::get('/homeAdmin', [HomeController::class, 'homeAdmin'])->name('homeAdmin');

    /*===================== COOKIES =====================*/

    Route::get('/cookiess', [CookiesController::class, 'index'])->name('cookies.index');
    Route::get('/cookiess/create', [CookiesController::class, 'create'])->name('cookies.create');
    Route::post('/cookiess/store', [CookiesController::class, 'store'])->name('cookies.store');
    Route::get('/cookiess/edit/{id}', [CookiesController::class, 'edit'])->name('cookies.edit');
    Route::put('/cookiess/update/{id}', [CookiesController::class, 'update'])->name('cookies.update');
    Route::delete('/cookiess/delete/{id}', [CookiesController::class, 'destroy'])->name('cookies.delete');

    /*===================== Detail COOKIES =====================*/
    Route::post('/detail/cookies/create', [DetailCookiesController::class, 'store'])->name('detail.store');



    /*===================== Berat =====================*/
    Route::get('/berat', [BeratController::class, 'index'])->name('berat.index');
    Route::get('/berat/create', [BeratController::class, 'create'])->name('berat.create');
    Route::post('/berat/store', [BeratController::class, 'store'])->name('berat.store');
    Route::get('/berat/edit/{id}', [BeratController::class, 'edit'])->name('berat.edit');
    Route::put('/berat/update/{id}', [BeratController::class, 'update'])->name('berat.update');
    Route::delete('/berat/delete/{id}', [BeratController::class, 'destroy'])->name('berat.delete');

    /*===================== Payments =====================*/
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/payment/delete/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');

    /*===================== ADMIN =====================*/
});
