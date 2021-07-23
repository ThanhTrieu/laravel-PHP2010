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

Route::prefix('admin')
  ->as('admin.')
  ->middleware('backend.admin.login')
  ->group(function(){
    // account
    Route::get('account',[AccountController::class, 'index'])->name('account');
    //backend/dashboard
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/test',[DashboardController::class, 'test']);
    Route::get('dashboard/demo',[DashboardController::class, 'demo']);
    // brand
    Route::get('brand',[BrandController::class, 'index'])->name('brand');
    Route::get('insert-brand',[BrandController::class, 'add'])->name('add.brand');
    Route::post('handle-insert-brand',[BrandController::class, 'handleAdd'])->name('handle.add.brand');
    Route::post('delete-brand',[BrandController::class,'deleteBrand'])->name('delete.brand');
    Route::get('brand/{slug}/{id}',[BrandController::class, 'edit'])->name('brand.edit');
    Route::get('brand/not-found',[BrandController::class, 'errorBrand'])->name('brand.error');
    Route::post('edit/brand/{id}',[BrandController::class, 'handleEdit'])->name('handle.edit.brand');
});

Route::prefix('admin')->as('admin.')->group(function () {
  // backend/login
  Route::get('login',[LoginController::class, 'index'])
    ->middleware('if.backend.admin.login')
    ->name('login');
  // handle login
  Route::post('handle-login', [LoginController::class, 'handleLogin'])->name('handle.login');
  // backend/logout
  Route::post('logout',[LoginController::class, 'logout'])->name('handle.logout');
});