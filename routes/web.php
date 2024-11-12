<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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




Auth::routes();



Route::get('/admin', [ProductController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/create', [ProductController::class, 'create'])->name('admin.create')->middleware('auth');
Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store')->middleware('auth');
Route::get('/admin/show/{id}', [ProductController::class, 'show'])->name('admin.show')->middleware('auth');
Route::get('/admin/edit/{id}', [ProductController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::put('/admin/update/{id}', [ProductController::class, 'update'])->name('admin.update')->middleware('auth');
Route::delete('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('admin.destroy')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/increment', [CartController::class, 'increment'])->name('cart.increment');
Route::post('cart/decrement', [CartController::class, 'decrement'])->name('cart.decrement');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::get('/', [ConsoleController::class, 'index'])->name('home');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
