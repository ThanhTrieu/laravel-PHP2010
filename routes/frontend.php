<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;

/*
|--------------------------------------------------------------------------
| Frontend Routes for users
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about',[AboutController::class,'index'])->name('about');

// cart
Route::get('cart',[CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}',[CartController::class,'addCart'])->name('add.cart');