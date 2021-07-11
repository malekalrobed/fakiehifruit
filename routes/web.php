<?php

use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
Route::resource('/users', UsersController::class);
Route::resource('/sections', SectionsController::class);
Route::resource('/collections', CollectionsController::class);
Route::resource('/products', ProductsController::class);
Route::resource('/stocks', StocksController::class);
Route::resource('/units', UnitsController::class);
Route::resource('/colors', ColorsController::class);
Route::resource('/sliders', SlidersController::class);

/* Start Frontend Routing */
Route::get('/', [FrontendController::class, 'index']);
Route::get('/section/{id}', [FrontendController::class, 'section']);
Route::get('/collection/{id}', [FrontendController::class, 'collection']);
Route::get('/product/{id}', [FrontendController::class, 'product']);
Route::get('/filter', [FrontendController::class, 'filter']);

/* End Frontend Routing */
Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
  ]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
