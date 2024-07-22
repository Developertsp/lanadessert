<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FAQController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboad');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/faq', [FAQController::class, 'index'])->name('faq');
