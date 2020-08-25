<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealerController extends Controller
{

    function dashboard(){
		return view('dealer.index');
	}

	function commission(){
		return view('dealer.commission');
	}

	function stock(){
		return view('dealer.stock');
	}

	function productreport(){
		return view('dealer.productreport');
	}

	function createDealerForm(){
		return view('admin.createdealer');

	}


}
