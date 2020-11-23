<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
	


	function deposit(){
		return view('admin.transaction.deposit');

	}

	function withdraw(){
		return view('admin.transaction.withdraw');

	}
	function report(){
		return view('admin.transaction.report');

	}
	function transfer(){
		return view('admin.transaction.transfer');

	}


}
