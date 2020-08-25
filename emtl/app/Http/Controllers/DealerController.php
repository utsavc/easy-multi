<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealerController extends Controller
{
    //

	function createDealerForm(){
		return view('admin.createdealer');

	}


}
