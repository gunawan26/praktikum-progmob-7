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
            Route::get('/daerah','DashboardController@Daerah')->name('admin.dashboard.daerah');
            Route::get('/bioskop','DashboardController@Bioskop')->name('admin.dashboard.bioskop');
			Route::get('/seatplan','DashboardController@Seatplan')->name('admin.dashboard.seatplan');
			Route::get('/addbioskop','DashboardController@Createbioskop')->name('admin.dashboard.bioskop.createbioskop');
			Route::get('/editbioskop/{$bioskops->id}','DashboardController@Editbioskop')->name('admin.dashboard.bioskop.editbioskop');
			Route::get('/bioskop/{$bioskops->id}','DashboardController@Destroybioskop')->name('admin.dashboard.bioskop.destroybioskop');
			Route::post('/editbioskop','DashboardController@Updatebioskop')->name('admin.dashboard.bioskop.updatebioskop');
			Route::post('/addbioskop','DashboardController@Addbioskop')->name('admin.dashboard.bioskop.addbioskop');
            Route::post('/tambah/provinsi','DashboardController@AddProvinsi')->name('admin.dashboard.daerah.provinsi');
            Route::post('/tambah/kabupaten','DashboardController@AddKabupaten')->name('admin.dashboard.daerah.kabupaten');
        });
    });


});
