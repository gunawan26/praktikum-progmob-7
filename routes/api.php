<?php

use Illuminate\Http\Request;

Route::group([


    'prefix' => 'auth'

], function () {

    Route::post('login','AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');
    Route::post('register', 'AuthController@register');
    Route::get('hello','api\TestApiController@helloworld');



    Route::get('sedang-tayang','api\HomeController@filmSedangTayang');
    Route::get('akan-tayang','api\HomeController@filmAkanTayang');
    Route::get('list-bioskop/{id_film}','api\JadwalController@showListBioskop');
    Route::post('add-wishlist','api\HomeController@addWishList');
    Route::delete('remove-wishlist/{id}','api\HomeController@deleteWishList');
});
