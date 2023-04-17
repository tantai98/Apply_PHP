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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function(){

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    
    Route::middleware('auth:api')->group(function() {
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
        Route::post('createPost','PostController@create');
        Route::get('post/{id}','PostController@edit');
        Route::get('delete/{id}','PostController@delete');

        Route::post('kh','PostController@');
        Route::get('post/{id}','PostController@edit');
        Route::get('delete/{id}','PostController@delete');
    });

});
