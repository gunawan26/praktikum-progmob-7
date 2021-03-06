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
    Route::get('/','AdminController@loginPage')->name('admin.log');
    Route::get('/login','AdminController@loginPage')->name('admin.loginpage');
    Route::get('/register','AdminController@registerAdmin')->name('admin.registerpage');
    Route::post('/login','AdminController@login')->name('admin.login');
    Route::post('/register','AdminController@register')->name('admin.register');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::group(['middleware' => ['auth:web_admins']], function () {
            Route::get('/','AdminController@HomeDashboard')->name('admin.dashboard');
			
			//Bioskop Only//
			Route::resource('bioskop', 'BioskopController');
			Route::resource('studio', 'StudioController');
			Route::resource('kursilist','KursiListController');
			Route::resource('kursi','KursiController');
			Route::resource('daerah', 'DaerahController');
			
			//Film Only//
			Route::resource('jadwal_film', 'JadwalController');
			Route::resource('genre','GenreController');
			Route::resource('umur','UmurController');
			Route::resource('film','FilmController');
			
			
			//Transaksi Only//
			Route::resource('transaksi', 'TransaksiController');
			
			//Film Only//
            Route::get('/daerah','DashboardController@Daerah')->name('admin.dashboard.daerah');
            Route::post('/tambah/provinsi','DashboardController@AddProvinsi')->name('admin.dashboard.daerah.provinsi');
            Route::post('/tambah/kabupaten','DashboardController@AddKabupaten')->name('admin.dashboard.daerah.kabupaten');
        });
    });


});
