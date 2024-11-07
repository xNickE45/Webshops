<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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


Route::get('/', [ConsoleController::class, 'index'])->name('home');


