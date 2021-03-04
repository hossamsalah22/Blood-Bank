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


Route::group(
    ['namespace' => 'App\Http\Controllers\Front\Ar'], function () {
        Route::get('/', 'MainController@home');
        Route::resource('posts', 'PostsController');
        Route::resource('register', 'ClientsController');
    }
);


Route::group(
    ['namespace' => 'App\Http\Controllers','prefix' => 'admin', 'middleware' => ['auth:web',
    'App\Http\Middleware\AutoCheckPermission']], function () {
        Route::resource('home', 'HomeController');
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

Route::get(
    '/admin', function () { return view('welcome');
    }
);

Auth::routes(['register' => false]);
