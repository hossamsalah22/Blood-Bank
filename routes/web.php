<?php

use Illuminate\Support\Facades\Auth;
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

Route::get(
    '/', function () { return view('welcome');
    }
);

Route::group(
    ['namespace' => 'App\Http\Controllers', 'middleware' => ['auth:web',
     'App\Http\Middleware\AutoCheckPermission']], function () {
        Route::get('home', 'HomeController@index');
        Route::post('logout', 'Auth\LoginController@logout');
        Route::resource('governorate', 'GovernorateController');
        Route::resource('city', 'CitiesController');
        Route::resource('category', 'CategoriesController');
        Route::resource('post', 'PostsController');
        Route::resource('client', 'ClientsController');
        Route::resource('blood-type', 'BloodTypesController');
        Route::resource('donation-request', 'DonationRequestsController');
        Route::resource('setting', 'SettingsController');
        Route::resource('contact', 'ContactsController');
        Route::resource('change-password', 'ChangePasswordController');
        Route::resource('user', 'UsersController');
        Route::resource('role', 'RolesController');
    }
);

Auth::routes();



