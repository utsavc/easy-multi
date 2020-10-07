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
	Route::get('/profile', 'AdminController@profile');


	Route::group(['prefix'=>'user'], function(){
		Route::get('/create-user', 'AdminController@createUser');
		Route::get('/add-dealer', 'DealerController@createDealerForm')->name('createDealer');
		Route::post('/add-dealer', 'DealerController@addDealer');
		Route::get('/edit-dealer/{id}', 'DealerController@editDealer')->name('dealerEdit');
		Route::post('/edit-dealer/{id}', 'DealerController@updateDealer')->name('dealerUpdate');
		Route::post('/delete-dealer/{id}', 'DealerController@deleteDealer')->name('dealerDelete');


		Route::get('/add-retailer', 'RetailerController@createRetailer')->name('createRetailer');
		Route::post('/add-retailer', 'RetailerController@addRetailer');
		Route::get('/edit-retailer/{id}', 'RetailerController@editRetailer')->name('retailerEdit');
		Route::post('/edit-retailer/{id}', 'RetailerController@updateRetailer')->name('retailerUpdate');
		Route::post('/delete-retailer/{id}', 'RetailerController@deleteRetailer')->name('retailerDelete');


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
	
	Route::get('/', 'DealerController@dashboard')->name('dealer');
	Route::get('/productreport', 'DealerController@productreport');
	Route::get('/commission', 'DealerController@commission');
	Route::get('/stock', 'DealerController@stock');
	Route::get('/transfer', 'DealerController@transferbyDealer');
	Route::get('/transfertoretailer', 'DealerController@createTransfer')->name('createTransfer');
	Route::get('/edit-transfer/{id}', 'DealerController@editTransfer')->name('transferproductEdit');
	Route::post('/update-transfer/{id}', 'DealerController@updateTransfer')->name('transferproductUpdate');
	Route::post('/delete-transfer/{id}', 'DealerController@deleteTransfer')->name('transferproductDelete');
	Route::get('/profile', 'DealerController@profile');
	
});



Route::group(['prefix'=>'retailer'], function(){

	Route::get('/report', 'RetailerController@productreport')->name('retailer');
	Route::get('/commission', 'RetailerController@commission');
	Route::get('/stock', 'RetailerController@stock');
	Route::get('/transfer', 'RetailerController@transfer');
	Route::get('/transfertocustomer', 'RetailerController@createTransfer')->name('createTransfer');
	Route::get('/edit-transfer/{id}', 'RetailerController@editTransfer')->name('transferproductEdit');
	Route::post('/update-transfer/{id}', 'RetailerController@updateTransfer')->name('transferproductUpdate');
	Route::post('/delete-transfer/{id}', 'RetailerController@deleteTransfer')->name('transferproductDelete');
	Route::get('/profile', 'RetailerController@profile');
	
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
