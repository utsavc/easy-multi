<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

	function purchase(){

		return view('admin.customer.purchase');

	}
	
	function purchaseReport(){

		return view('admin.customer.purchasereport');

	}
	
	function sales(){

		return view('admin.customer.sales');

	}
	
	function salesReport(){

		return view('admin.customer.salesreport');

	}
	
	function deposit(){

		return view('admin.customer.deposit');

	}


	
	function depositReport(){

		return view('admin.customer.depositreport');

	}



	
	function withdraw(){

		return view('admin.customer.withdraw');

	}

	
	function withdrawReport(){

		return view('admin.customer.withdrawreport');

	}

	
	function comission(){

		return view('admin.customer.comission');

	}





}
