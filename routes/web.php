<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class, 'index'])->name('index');
Route::post('/product',[ProductController::class, 'store'])->name('store-product');
Route::get('detail-product/{id}',[ProductController::class, 'detail'])->name('detail-product');