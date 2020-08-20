<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	function dashBoard(){
		return view('admin.dashboard');
	}

}
