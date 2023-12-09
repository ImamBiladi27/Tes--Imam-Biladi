<?php

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


Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');

Route::post('actionlogin', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::post('storeuser', [\App\Http\Controllers\LoginController::class, 'storeuser'])->name('storeuser');

//middleware digunakan bila menggunakan Auth di controller
// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth'); 

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/createmobil', [\App\Http\Controllers\HomeController::class, 'createmobil'])->name('createmobil');
Route::post('storemobil', [\App\Http\Controllers\HomeController::class, 'storemobil'])->name('storemobil');
Route::get('/cars/{carId}/checkout', [\App\Http\Controllers\HomeController::class, 'showCheckoutForm'])->name('checkout.form');
Route::post('/cars/{carId}/checkout', [\App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');

Route::get('/orderdata', [\App\Http\Controllers\HomeController::class, 'orderdata'])->name('orderdata');
Route::get('/return', [\App\Http\Controllers\HomeController::class, 'return'])->name('return');


Route::post('/return-car', [\App\Http\Controllers\HomeController::class, 'returnCar'])->name('return_car');