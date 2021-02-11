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
        Route::get('governorates', 'MainController@governorates');
        Route::get('cities', 'MainController@cities');
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        Route::group(
            ['middleware' => 'auth:api'], function () {
                Route::get('categories', 'MainController@categories');
                Route::get('posts', 'MainController@posts');
            }
        );
    }
);




