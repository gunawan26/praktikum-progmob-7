<?php

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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/////// Route Admin //////


Route::group(['prefix' => 'admin'], function () {

    Route::get('/login','AdminController@loginPage')->name('admin.loginpage');
    Route::get('/register','AdminController@registerAdmin')->name('admin.registerpage');
    Route::post('/login','AdminController@login')->name('admin.login');
    Route::post('/register','AdminController@register')->name('admin.register');
    Route::group(['prefix'=> 'dashboard'],['middleware' => ['auth:web_admins']], function () {
        Route::get('/','AdminController@HomeDashboard')->name('admin.dashboard');
        Route::get('/daerah','DashboardController@Daerah')->name('admin.dashboard.daerah');
        Route::get('/bioskop','DashboardController@Bioskop')->name('admin.dashboard.bioskop');
        Route::post('/tambah/provinsi','DashboardController@AddProvinsi')->name('admin.dashboard.daerah.provinsi');
        Route::post('/tambah/kabupaten','DashboardController@AddKabupaten')->name('admin.dashboard.daerah.kabupaten');
    });

});
