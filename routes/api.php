<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user', function (Request $request) {
        return $request->user();
    }
);

Route::group(
    ['prefix' => 'v1' , 'namespace' => 'App\Http\Controllers\Api'], function () {
        Route::get('governorates', 'MainCycle\GovernoratesController@index');
        Route::get('cities', 'MainCycle\CitiesController@index');
        Route::post('register', 'AuthCycle\RegisterController@index');
        Route::post('login', 'AuthCycle\LoginController@index');
        Route::post('resetPassword', 'AuthCycle\ResetPasswordController@index');
        Route::post('newPassword', 'AuthCycle\NewPasswordController@index');

        Route::group(
            ['middleware' => 'auth:api'], function () {
                Route::get('categories', 'MainCycle\CategoriesController@index');
                Route::get('posts', 'MainCycle\PostsController@index');
                Route::post('profile', 'AuthCycle\ProfileController@index');
                Route::post('donations/create', 'MainCycle\DonationsController@createRequest');
                Route::get('donations', 'MainCycle\DonationsController@index');
                Route::get('settings', 'Admin\SettingsController@index');
                Route::post('favouration', 'MainCycle\PostsController@favouration');
                Route::get('favourites', 'MainCycle\PostsController@favourites');
                Route::post('new-device', 'AuthCycle\NotificationsController@registerToken');
                Route::post('remove-device', 'AuthCycle\NotificationsController@removeToken');
                Route::post('notificationSettings', 'AuthCycle\NotificationsController@settings');
            }
        );
    }
);




