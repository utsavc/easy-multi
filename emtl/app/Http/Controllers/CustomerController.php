<?php

namespace App\Http\Controllers;
use App\Retailer;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
	function createCustomerForm(){		
		$retailers=Retailer::all();
		return view('admin.createcustomer',['retailers'=>$retailers]);
	}


	function createCustomer(Request $request){

		$validated=$request->validate([
			'name' => 'required|String',
			'address' => 'required|String',
			'phone' => 'required|String',
			'retailer_id'=>'required|String|exists:retailers,id',
		]);

		Customer::create($validated);
		return back()->with('success','Product created successfully!');
		
	}


}
