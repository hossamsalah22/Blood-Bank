<?php

use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\CitiesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('governorate', 'App\Http\Controllers\GovernorateController');
Route::resource('city', 'App\Http\Controllers\CitiesController');
Route::resource('category', 'App\Http\Controllers\CategoriesController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
