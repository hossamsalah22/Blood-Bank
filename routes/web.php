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


// WebSite Routes
Route::group(
    ['namespace' => 'App\Http\Controllers\Front\Ar'],
    function () {
        Route::get('register', 'AuthController@register');
        Route::post('register', 'AuthController@registerCreate');
        Route::get('client/login', 'AuthController@login');
        Route::post('client/login', 'AuthController@loginCheck');
        Route::group(
            ['middleware' => 'auth:clients'],
            function () {
                Route::get('/contact-us', 'MainController@contact');
                Route::post('/contact-us', 'MainController@contactUs');
                Route::get('/', 'MainController@home');
                Route::post('toggle-favourite', 'MainController@toggleFavourite');
                Route::get('/about-us', 'MainController@about');
                Route::get('/donation-requests', 'MainController@donations');
                Route::get('/donation-requests/{id}', 'MainController@donationDetails');
                Route::get('posts', 'PostController@index');
                Route::get('posts/{id}', 'PostController@show');
            }
        );
    }
);

// Admin Dashboard Routes
Auth::routes(['register' => false]);
Route::group(
    ['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'middleware' => [
        'auth:web',
        'App\Http\Middleware\AutoCheckPermission'
    ]],
    function () {
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
    '/admin',
    function () {
        return view('welcome');
    }
);
