<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	function dashBoard(){
		return view('admin.dashboard');
	}


	public function createUser($value=''){
		return view('admin.createuser');
	}









	function createProduct(){

		return view('admin.product.create');

	}



	function addProductStock(){

		return view('admin.product.add');

	}




	function stockReport(){

		return view('admin.product.stock');

	}




	function dealerTransfer(){

		return view('admin.dealer.transfer');

	}



	function dealerComission(){

		return view('admin.dealer.comission ');

	}



	function dealerStock(){

		return view('admin.dealer.stock ');

	}



	function dealerReport(){
		return view('admin.dealer.stock ');
		
	}



	function retailerTransfer(){

		return view('admin.retailer.transfer');

	}



	function retailerComission(){

		return view('admin.retailer.comission ');

	}



	function retailerStock(){

		return view('admin.retailer.stock ');

	}



	function report()	{
		return view('admin.report');
	}








}
