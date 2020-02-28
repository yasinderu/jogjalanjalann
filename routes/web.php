<?php

use Illuminate\Http\Request;
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


Route::auth();

Route::get('/home', 'IsiController@index');

Route::group(['middleware' => ['web']], function () {
	
Route::resource('isi', 'IsiController');
Route::get('/isi/create', 'IsiController@create');
	Route::post('/isi/store', 'IsiController@store');
	//Route::get('/isi/{id}/edit', 'IsiController@edit');
	Route::put('/isi/{id}', 'IsiController@update');
	Route::delete('/isi/{id}', 'IsiController@destroy');
	Route::get('/, IsiController@index');
});
Route::resource('artikel', 'artikelController');
//Route::resource('/artikel/kategori', 'KategoriController', ['only' => ['index', 'show']]);
Route::get('/pantai', 'KategoriController@pantai');
Route::get('/budaya', 'KategoriController@budaya');
Route::get('/gunung', 'KategoriController@gunung');
Route::get('/kuliner', 'KategoriController@kuliner');
//Route::get('/kategori', 'KategoriController@index');
//Route::get('/kategori/{id}', 'KategoriController@show');
Route::get('/search', 'KategoriController@search');
