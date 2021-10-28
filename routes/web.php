<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TrackingController;
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

//Login & Register
Route::get('/', [LoginController::class, 'create'])->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('ajax-register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [LoginController::class, 'create'])->middleware('guest');
Route::post('ajax-login', [LoginController::class, 'check_login'])->middleware('guest');
//End Login & Register
Route::get('logOut', [LoginController::class, 'destroy']);
Route::get('dashboard', [DashboardController::class, 'create']);
//Product
Route::get('create/product', [ProductController::class, 'index'])->name('product');
Route::get('list/product', [ProductController::class, 'create'])->name('list-product');
Route::get('dataProduct', [ProductController::class, 'createProduct'])->name('dataProduct');
Route::get('edit/product/{ids}', [ProductController::class, 'edit']);
Route::post('ajax-edit-product', [ProductController::class, 'update']);
Route::post('ajax-delete-product', [ProductController::class, 'destroy']);
Route::get('createTruckTypeJson', [ProductController::class, 'createTruckTypeJson']);
Route::get('createTruckBrandJson', [ProductController::class, 'createTruckBrandJson']);
Route::get('createBrandJson', [ProductController::class, 'createBrandJson']);
Route::post('ajax-order-product', [ProductController::class, 'store']);
//End Product
//Master
Route::get('create', [MasterController::class, 'create'])->name('master');
Route::post('ajax-order', [MasterController::class, 'store']);
Route::post('ajax-order-truck-brand', [MasterController::class, 'storeTruckBrand']);
Route::post('ajax-order-truck-type', [MasterController::class, 'storeTruckType']);
//End Master
//Tracking
Route::get('tracking', [TrackingController::class, 'create'])->middleware('auth');
Route::get('trackingProduct', [TrackingController::class, 'createProduct']);
