<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	function dashBoard(){
		return view('admin.dashboard');
	}


	function createDealer(){

		return view('admin.createdealer');

	}



	function createRetailer(){

		return view('admin.createretailer');

	}

}
