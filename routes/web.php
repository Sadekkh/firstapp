<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\activeUsers;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\admincategoryController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminOfferController;
use App\Http\Controllers\adminOrderController;
use App\Http\Controllers\adminProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\wishlistController;
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
    return view('layouts.main');
});

Auth::routes();
Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });
Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');
Route::post('/update-exit-time', 'activeUsers@index')->name('updateExitTime');
Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/products', [HomeController::class, 'product'])->name('product');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/product/{id}', [HomeController::class, 'getProduct'])->name('getProduct');


Route::post('/add-to-cart', [cartController::class, 'addToCart']);
Route::post('/add-to-cart/{id}', [cartController::class, 'delete'])->name('cart.destroy');
Route::get('/view-cart', [cartController::class, 'show'])->name('view.cart');
Route::get('/add_prod_cart/{id}', [cartController::class, 'addproductcart'])->name('addproductcart');
Route::post('/add_product_cart/{id}', [cartController::class, 'addproductcart1'])->name('add_product_cart');
Route::get('/checkout', [cartController::class, 'checkout'])->name('checkout');
Route::get('/getcity/{state}', [cartController::class, 'getcity']);
Route::post('/valid-checkout', [cartController::class, 'valid_checkout'])->name('valid_checkout');

Route::post('/add-to-wishlist', [wishlistController::class, 'addToCart']);
Route::post('/add-to-wishlist/{id}', [wishlistController::class, 'delete'])->name('wishlist.destroy');


Route::get('/admin/main', [adminController::class, 'index'])->name('admin');

Route::get('/admin/category', [admincategoryController::class, 'index'])->name('admin.category');
Route::get('/admin/category/creates', [admincategoryController::class, 'creates'])->name('admin.category.creates');
Route::get('/admin/category/{id}', [admincategoryController::class, 'shows'])->name('admin.category.show');
Route::post('/admin/category/update/{id}', [admincategoryController::class, 'update'])->name('admin.category.update');
Route::post('/admin/category/store', [admincategoryController::class, 'store'])->name('admin.category.store');

Route::get('/admin/offer', [adminOfferController::class, 'index'])->name('admin.offer');
Route::get('/admin/offer/creates', [adminOfferController::class, 'creates'])->name('admin.offer.creates');
Route::get('/admin/offer/{id}', [adminOfferController::class, 'shows'])->name('admin.offer.show');
Route::post('/admin/offer/update/{id}', [adminOfferController::class, 'update'])->name('admin.offer.update');
Route::post('/admin/offer/store', [adminOfferController::class, 'store'])->name('admin.offer.store');

Route::get('/admin/products/{id}', [adminProductController::class, 'index'])->name('admin.product.show');
Route::get('/admin/products/', [adminProductController::class, 'showall'])->name('admin.product.index');
Route::get('/admin/products/edit/{id}', [adminProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/admin/products/update/{id}', [adminProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/product/create', [adminProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/store', [adminProductController::class, 'store'])->name('admin.product.store');


Route::post('/admin/image/delete/{id}', [adminProductController::class, 'image_delete'])->name('admin.image.delete');
Route::post('/admin/image/set/{id}/{img}', [adminProductController::class, 'setDefaultImage'])->name('admin.image.set');

Route::get('/admin/order', [adminOrderController::class, 'index'])->name('admin.order');
Route::get('/admin/order/{id}', [adminOrderController::class, 'shows'])->name('admin.order.show');
Route::post('/admin/order/delivered/{id}', [adminOrderController::class, 'order_delivered'])->name('order.delivered');
Route::post('/admin/order/update/{id}', [adminOrderController::class, 'update'])->name('admin.order.update');
