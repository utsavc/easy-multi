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
		Route::get('/add-dealer', 'DealerController@createDealerForm')->name('createDealer');
		Route::post('/add-dealer', 'DealerController@addDealer');


		Route::get('/add-customer', 'CustomerController@createCustomerForm')->name('createCustomerForm');
		Route::post('/add-customer', 'CustomerController@createCustomer')->name('createCustomer');




		Route::get('/edit-dealer/{id}', 'DealerController@editDealer')->name('dealerEdit');
		Route::post('/edit-dealer/{id}', 'DealerController@updateDealer')->name('dealerUpdate');
		Route::post('/delete-dealer/{id}', 'DealerController@deleteDealer')->name('dealerDelete');

		Route::get('/add-retailer', 'RetailerController@createRetailer')->name('createRetailer');
		Route::post('/add-retailer', 'RetailerController@addRetailer');


		Route::get('/edit-retailer/{id}', 'RetailerController@editRetailer')->name('retailerEdit');
		Route::post('/edit-retailer/{id}', 'RetailerController@updateRetailer')->name('retailerUpdate');
		Route::post('/delete-retailer/{id}', 'RetailerController@deleteRetailer')->name('retailerDelete');




		Route::get('/create-group', 'GroupController@createGroupForm')->name('createGroupForm');
		Route::post('/create-group', 'GroupController@createGroup')->name('createGroup');
		Route::get('/group-details/{id}', 'GroupController@groupDetails')->name('groupDetails');
		Route::get('/add-members', 'GroupController@addMembersForm')->name('addMembers');
		Route::post('/add-members', 'GroupController@addMembers')->name('addMembers');



	});


	Route::group(['prefix'=>'product'], function(){
		Route::get('/create', 'ProductController@createProductForm')->name('creaeteProductForm');
		Route::post('/create', 'ProductController@createProduct')->name('createProduct');
		Route::get('/add', 'ProductController@addProductStockForm')->name('addProductStockForm');
		Route::post('/add', 'ProductController@addProductStock')->name('addProductStock');
		Route::get('/stock/{id}', 'ProductController@stockReport')->name('viewStocksReport');
		Route::get('/outstock/{id}', 'ProductController@outStockReport')->name('viewOutStockReport');
		Route::get('/transfer', 'ProductController@dealerTransferForm')->name('dealerTransferForm');
		Route::post('/transfer', 'ProductController@dealerTransfer')->name('dealerTransfer');
	});



	Route::group(['prefix'=>'transaction'], function(){
		Route::get('/deposit', 'TransactionController@deposit')->name('deposit');
		Route::get('/withdraw', 'TransactionController@withdraw')->name('withdraw');
		Route::get('/report', 'TransactionController@report')->name('report');
		Route::get('/transfer', 'TransactionController@transfer')->name('transfer');
	});


/*
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

	});*/

});




Route::group(['prefix'=>'dealer'], function(){
	
	Route::get('/', 'DealerController@dashboard');
	Route::get('/productreport', 'DealerController@productreport');
	Route::get('/commission', 'DealerController@commission');
	Route::get('/stock', 'DealerController@stock');
	Route::get('/transfer', 'DealerController@transferbyDealer');
	
});



Route::group(['prefix'=>'retailer'], function(){
	Route::get('/transfer', 'RetailerController@transfer');
	Route::get('/report', 'RetailerController@productreport');
	Route::get('/commission', 'RetailerController@commission');
	Route::get('/stock', 'RetailerController@stock');
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
