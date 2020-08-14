<?php

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




	Route::get('/', function () {
		
	    return view('welcome');
	});


	//Route::get('/rules', 'RulesController@index');
	//Route::get('/rules/create', 'RulesController@create');
	Route::resource('/rules','RulesController');
	Route::resource('/schools','SchoolsController');
	Route::get('/schools/create/{id}','SchoolsController@getTowns');
	Route::get('/schools/create/city/{id}','SchoolsController@getCity');

	Route::get('/school/busqueda/','SchoolsController@busqueda')->name('buscador');
	Route::get('/school/view/{id}','SchoolsController@vista');
	
	Route::resource('/users','UsersController');
	Route::get('/users/create/{id}','UsersController@getTowns');
	Route::get('/users/create/city/{id}','UsersController@getCity');

	Route::resource('/register','RegisterController');
	Route::get('/register/create/{id}','UsersController@getTowns');
	Route::get('/register/create/city/{id}','UsersController@getCity');

	Route::resource('/reports','ReportsController');

	Auth::routes(['register'=>false,'reset'=>false]);

	Route::get('/home', 'HomeController@index')->name('home');
Route::get('locale/{locale}', function ($locale) {
	Session::put('locale',$locale);
	return redirect()->back();
});
