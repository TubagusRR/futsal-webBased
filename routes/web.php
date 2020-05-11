<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('transaksi/', function () {
    return view('item2.create');
});
Route::get('item/', function () {
    return view('item.create');
});


Auth::routes();
Route::group(['middleware'=> 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	// Route::resource('/item2', 'TransaksiController');
	Route::get('item2', function () {
		return view('item2.create');
	});

	Route::group(['middleware' => 'admin'], function() {
		Route::resource('/item', 'ItemController');
		Route::get('/transaksi', 'TransaksiController@lihatdata');
		Route::post('/transaksi','TransaksiController@store');
	});
	Route::get('/create','TransaksiController@index')->name('create.index');

	Route::get('/export-laravel','ExportLaravelController@export');
	Route::get('/data','ExportLaravelController@index')->name('data.index');


	
	// Route::get('item', 'ItemController@index')->name('item.index');
	// Route::post('item', 'ItemController@store')->name('item.store');
	// Route::get('/item/{id}', 'ItemController@edit')->name('item.edit');
	// Route::put('/item/{id}', 'ItemController@update')->name('item.update');
	// Route::delete('item/{id}', 'ItemController@destroy')->name('item.destroy');
});
