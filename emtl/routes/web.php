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

Auth::routes();



Route::group(['prefix'=>'admin'], function(){

	Route::get('/', 'AdminController@dashBoard')->name('dashboard');


});


Route::group(['prefix'=>'dealer'], function(){
});


Route::group(['prefix'=>'retailer'], function(){

});


/*For Tests Customer 
Route::group(['prefix'=>'customer'], function(){

});*/



//Testing Login Pages
Route::get('/test', function () {
	return view('test');
})->name('login');
