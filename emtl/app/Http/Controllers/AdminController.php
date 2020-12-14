<?php

namespace App\Http\Controllers;
use App\Customer;
use App\CustomerGroups;
use App\Dealer;
use App\DealerStock;
use App\Deposit;
use App\Group;
use App\GroupAccount;
use App\GroupDeposit;
use App\Product;
use App\ProductStocks;
use App\Retailer;
use App\User;
use App\Withdraw;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	function dashBoard(){
		$dealer= Dealer::all();
		$retailer= Retailer::all();
		$customer= Customer::all();
		$product= Product::all();
		return view('admin.dashboard',['dealer'=>$dealer,'retailer'=>$retailer,'customer'=>$customer,'product'=>$product]);
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
		return view('admin.product.transfer');
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
