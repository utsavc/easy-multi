<?php

namespace App\Http\Controllers;
use App\Retailer;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
	function createCustomerForm(){		
		$retailers=Retailer::all();
		$customers=Customer::all();
		return view('admin.createcustomer',['retailers'=>$retailers,'customers'=>$customers]);
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


	public function editCustomer($id, Request $request){
		$customer=Customer::firstWhere('id', $id);	
		$allretailer=Retailer::orderBy('id','DESC')->get();
		return view('admin.editCustomer',['customer'=>$customer,'retailers'=>$allretailer]);
	}



	public function updateCustomer($id, Request $request){

		$customer=Customer::findOrFail($id);
		$validated=$request->validate([
			'name' => 'required|String',
			'address' => 'required|String',
			'phone' => 'required|String',
			'retailer_id'=>'required|String|exists:retailers,id',
		]);
		$customer->update($validated);
		return redirect()->route('createCustomerForm')->with('success','Updated successfully!');

	}



	function deleteCustomer($id){
		$customer=Customer::findOrFail($id);
		$status=$customer->status;
		if ($status=="active") {
			$customer->status="inactive";

		}else{
			$customer->status="active";

		}
		$customer->save();
		return redirect()->route('createCustomerForm')->with('success','Disabled successfully!');
	}





}
