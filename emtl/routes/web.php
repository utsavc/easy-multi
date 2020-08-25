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


Auth::routes();



Route::group(['prefix'=>'admin'], function(){

	Route::get('/', 'AdminController@dashBoard')->name('dashboard');
	Route::get('/report', 'AdminController@report');


	Route::group(['prefix'=>'user'], function(){
		Route::get('/create-user', 'AdminController@createUser');
		Route::get('/add-dealer', 'DealerController@createDealerForm');
		Route::get('/add-retailer', 'AdminController@createRetailer');
	});


	Route::group(['prefix'=>'product'], function(){
		Route::get('/create', 'AdminController@createProduct');
		Route::get('/add', 'AdminController@addProductStock');
		Route::get('/stock', 'AdminController@stockReport');
	});



	Route::group(['prefix'=>'dealer'], function(){

		Route::get('/transfer', 'AdminController@dealerTransfer');
		Route::get('/product-report/1', 'AdminController@dealerReport');
		Route::get('/comission', 'AdminController@dealerComission');
		Route::get('/stock', 'AdminController@dealerStock');

	});



	Route::group(['prefix'=>'retailer'], function(){

		Route::get('/transfer', 'AdminController@retailerTransfer');
		Route::get('/product-report/1', 'AdminController@retailerReport');
		Route::get('/comission', 'AdminController@retailerComission');
		Route::get('/stock', 'AdminController@retailerStock');

	});


	Route::group(['prefix'=>'customer'], function(){

		Route::get('/purchase', 'CustomerController@purchase');
		Route::get('/purchase/report', 'CustomerController@purchaseReport');
		Route::get('/comission', 'CustomerController@comission');
		Route::get('/deposit', 'CustomerController@deposit');
		Route::get('/deposit/report', 'CustomerController@depositReport');
		Route::get('/withdraw', 'CustomerController@withdraw');
		Route::get('/withdraw/report', 'CustomerController@withdrawReport');
		Route::get('/sales', 'CustomerController@sales');
		Route::get('/sales/report', 'CustomerController@salesReport');

	});

});




Route::group(['prefix'=>'dealer'], function(){
});


Route::group(['prefix'=>'retailer'], function(){

});


/*For Tests Customer 
Route::group(['prefix'=>'customer'], function(){

});*/



//login
Route::get('/', 'customAuth\UsersLoginController@login')->name('login');
Route::post('/login', 'customAuth\UsersLoginController@authenticate')->name('logins');




Route::group(['prefix'=>'auth'], function(){

	Route::get('/login', 'CustomerController@purchase');
	Route::get('/purchase/report', 'CustomerController@purchaseReport');

});
