<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersLoginController extends Controller
{

	function login(){
		return view('login');
	}



	function authenticate(Request $request){

		$request->validate([
			'username' => 'required|string',
			'password' => 'required|string',
		]);

		$testusername="utsav";
		$testpassword="utsav";

		$username=$request->username;
		$password=$request->password;

		if ($testusername==$username && $testpassword==$password) {

			$message = [
				'flashType'    => 'success',
				'flashMessage' => 'Logged in Successfully'
			];
			return redirect()->route('dashboard')->with($message);

			
		}else{


			$message = [
				'flashType'    => 'danger',
				'flashMessage' => 'Wrong Username or Password'
			];

			return back()->with($message);  
		}




	}


}


