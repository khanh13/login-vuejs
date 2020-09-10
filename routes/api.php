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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->namespace('Api')->prefix('auth')->group(function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');

    // Route::post('reset-password', 'Api\ForgotPasswordController@sendPasswordResetLink');
    // Route::post('reset/password', 'AuthController@callResetPassword');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'ResetPasswordController@reset');


});
Route::apiResource('/todos', 'Api\TodoController');

// Route::apiResource('/todos', 'Api\TodoController');
Route::namespace('Api')->group(function(){
    Route::apiResource('/users', 'UserController', ['except' => ['show', 'store']]);
});
