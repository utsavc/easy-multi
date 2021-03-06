<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RetailerLogin;
use App\DealerLogin;

class UsersLoginController extends Controller
{

	function login(){
		if(session('role') == 'admin'){
			return redirect()->route('dashboard');
		}
		elseif(session('role') == 'dealer'){
			return redirect()->route('dealer');
		}
		elseif(session('role') == 'retailer'){
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
			session(['role' => 'Admin',]);
			return redirect()->route('dashboard')->with('success','Logged In Successfully');
		}



		$retailer= RetailerLogin::where('username', $username)->where('password', $password)->first();
		if($retailer != null){	
			session(['role' => 'Retailer','session_id'=> $retailer->retailer_id]);
			return redirect()->route('retailer')->with('success','Logged In Successfully');
		}



		$dealer= DealerLogin::where('username', $username)->where('password', $password)->first();
		if($dealer != null){

			session(['role' => 'Dealer','session_id'=> $dealer->dealer_id]);
			return redirect()->route('dealer')->with('success','Logged In Successfully');
		}

		if($user==null && $dealer==null && $retailer==null){			

			return back()->with('danger','Wrong Username or Password!');
		}

	}


	function logout(Request $request){
		session()->forget('role');
		return redirect()->route('login');

	}


}
