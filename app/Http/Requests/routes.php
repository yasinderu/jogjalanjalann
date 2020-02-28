<?php

Route::get('/' function() {
	return view('welcome');
});

Route::resource('beach', 'BeachController');

Route::auth();

Route::get('/home', 'HomeController@index');