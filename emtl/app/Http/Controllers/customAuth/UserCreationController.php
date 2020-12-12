<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\DealerLogin;
use App\RetailerLogin;

class UserCreationController extends Controller{


	function createUser(Request $request){
		$type=strtoupper($request->type)
		if ($type='DEALER') {
			DealerLogin::create($validated);
			return back();
		} elseif ($type='RETAILER') {
			RetailerLogin::create($validated);
			return back();
		} else{
			abort(404);
		}
		

	}	


}
