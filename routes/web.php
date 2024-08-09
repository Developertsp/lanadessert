<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FAQController;



Route::get('/', [DashboardController::class, 'index'])->name('dashboad');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/menus', [MenuController::class, 'index'])->name('menus');
Route::get('/faq', [FAQController::class, 'index'])->name('faq');

Route::get('categories', [ApiController::class, 'categories'])->name('categories.all');
Route::get('menu', [ApiController::class, 'products'])->name('menu');
Route::get('product/{id}', [ApiController::class, 'product'])->name('product');

Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'view'])->name('cart.view');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('checkout/process', [CartController::class, 'checkout_process'])->name('checkout.process');
Route::get('order', [CartController::class, 'order'])->name('order');
Route::get('destroy', [CartController::class, 'destroy']);

Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');




