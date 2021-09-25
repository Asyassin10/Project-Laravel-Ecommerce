<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProuductController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\SocialiteController;
use App\Models\Category;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//login logout & register routes
Auth::routes();


//activate user account routes
Route::get('/activate/{code}', [ActivationController::class, 'activation'])->name('user.activate');
Route::get('/resend/{email}', [ActivationController::class, 'resendCode'])->name('resend');
Route::get('products_search/{product_id}', [ProuductController::class, 'show'])->name('show');


//products routes
Route::get('products/category/{category_id}', [HomeController::class, 'getProductsBycategpry'])->name('Categories');
Route::post('/add/cart/{prouduct}', [CartController::class, 'addtocart'])->name('cart.add');
Route::put('/update/cart/{prouduct}', [CartController::class, 'updatecart'])->name('cart.update');
Route::delete('/remove//cart/{prouduct}', [CartController::class, 'removecart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


//payment routes
Route::get('/handel-payment', [PaypalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('/cancel-payment', [PaypalPaymentController::class, 'PaymentCancel'])->name('cancel_payment');
Route::get('/success-payment', [PaypalPaymentController::class, 'Paymentsuccess'])->name('payment_success');


//admin routes

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::group(['middleware' => 'auth:admin'], function () {

    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/products', [AdminController::class, 'getproducts'])->name('admin.products');
    Route::get('/admin/orders', [AdminController::class, 'getorder'])->name('admin.order');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('logout.admin');

    // add - update - delete Product
    Route::get('/products/create', [ProuductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProuductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{product_id}', [ProuductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{product_id}', [ProuductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{product_id}', [ProuductController::class, 'destroy'])->name('products.delete');

    //order route
    Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/order/delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});