<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\BrandController;


/*
|--------------------------------------------------------------------------
| Backend Routes for admin
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->as('admin.')->group(function () {
  // as('admin.') : tien ro cho name cua routes

  // backend/login
  Route::get('login',[LoginController::class, 'index'])->name('login');
  Route::post('handle-login', [LoginController::class, 'handleLogin'])->name('handle.login');

  // backend/logout
  Route::get('logout',[LoginController::class, 'logout']);

  // account
  Route::get('account',[AccountController::class, 'index'])->name('account');

  //backend/dashboard
  Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
  Route::get('dashboard/test',[DashboardController::class, 'test']);
  Route::get('dashboard/demo',[DashboardController::class, 'demo']);

  // brand
  Route::get('brand',[BrandController::class, 'index'])->name('brand');
});