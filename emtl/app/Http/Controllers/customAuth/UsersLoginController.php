<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersLoginController extends Controller
{

	function login(){
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
		
	}


	function authenticate(Request $request){

		$request->validate([
			'username' => 'required|string',
			'password' => 'required|string',
		]);

		$username=$request->username;
		$password=$request->password;

		
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

		} else{

			$message = [
				'flashType'    => 'danger',
				'flashMessage' => 'Wrong Username or Password'
			];

			return back()->with($message);
		}



	}


}
