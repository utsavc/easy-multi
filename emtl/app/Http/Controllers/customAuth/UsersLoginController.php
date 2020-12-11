<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
=======
use App\User;
>>>>>>> Stashed changes

class UsersLoginController extends Controller
{

	function login(){
<<<<<<< Updated upstream
		return view('login');
=======
		if(session('role') == 'Admin'){
			return redirect()->route('dashboard');
		}
		elseif(session('role') == 'Dealer'){
			return redirect()->route('dealer');
		}
		elseif(session('role') == 'Retailer'){
			return redirect()->route('retailer');
		}
		else{
			return view('login');
		}
		
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
		if ($testusername==$username && $testpassword==$password) {
=======
		
        $user= User::where('username', $username)->where('password', $password)->first();

		
		if($user != null){

			if ($user->role == 'admin') {

				$message = [
					'flashType'    => 'success',
					'flashMessage' => 'Logged in Successfully'
				];
				// $request->session()->put('role', 'admin');
				session(['role' => 'Admin']);
				return redirect()->route('dashboard')->with($message);

				
			} elseif($user->role == 'dealer'){

				$message = [
					'flashType'    => 'success',
					'flashMessage' => 'Logged in Successfully'
				];
				session(['role' => 'Dealer']);
				return redirect()->route('dealer')->with($message);
>>>>>>> Stashed changes

			$message = [
				'flashType'    => 'success',
				'flashMessage' => 'Logged in Successfully'
			];
			return redirect()->route('dashboard')->with($message);

<<<<<<< Updated upstream
			
		}else{
=======
			} elseif($user->role == 'retailer'){

				$message = [
					'flashType'    => 'success',
					'flashMessage' => 'Logged in Successfully'
				];
				session(['role' => 'Retailer']);
				return redirect()->route('retailer')->with($message);


			} else{

				$message = [
					'flashType'    => 'danger',
					'flashMessage' => 'Cannot find role'
				];
	
				return back()->with($message);

			}
>>>>>>> Stashed changes


			$message = [
				'flashType'    => 'danger',
				'flashMessage' => 'Wrong Username or Password'
			];

			return back()->with($message);  
		}




	}


}


