<?php

use Illuminate\Http\Request;
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

Route::post('/activate-email/{code}', 'Api\AuthController@activateEmail');

Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');
Route::middleware('api')->namespace('Api')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');


    // Auth routes
    Route::middleware('auth:api')->prefix('auth')->group(function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('me', 'AuthController@me');
    });
});

Route::middleware('auth:api')->namespace('Api')->group(function () {
    // Todo routes
    Route::apiResource('/todos', 'TodoController');

    // User routes
    Route::get('users/me', 'UserController@me');
    Route::apiResource('/users', 'UserController', ['except' => ['show', 'store']]);
});
