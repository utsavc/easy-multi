<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Retailer;
use App\Dealer;

class RetailerController extends Controller{



	function createRetailer(){
		$retailer=Retailer::orderBy('id','DESC')->get();
		$dealer=Dealer::orderBy('id','DESC')->get();

		return view('admin.createretailer',['retailers'=>$retailer,'dealers'=>$dealer]);
	}


	function addRetailer(Request $request){

		$validated=$request->validate([
			'name' => 'required|string',
			'retailerid' => 'required|string|unique:retailers',
			'dealer_id' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|string',
		]);


		/*$retailer= new Retailer;
		$retailer->name=$request->name;
		$retailer->retailerid=$request->retailerid;
		$retailer->dealerid=$request->dealerid;

		$retailer->address=$request->address;
		$retailer->phone=$request->phone;
		$retailer->email=$request->email;

		$retailer->save();		*/

		Retailer::create($validated);
		return back()->with('success','Item created successfully!');

		//$dealer=Dealer::orderBy('id','DESC')->get();

		//return $retailer;

	}


	public function editRetailer($id, Request $request){
		$retailer=Retailer::firstWhere('id', $id);	
		$allretailer=Retailer::orderBy('id','DESC')->get();
		return view('admin.editretailer',['retailer'=>$retailer,'allretailer'=>$allretailer]);
	}



	public function updateRetailer($id, Request $request){

		$retailer=Retailer::findOrFail($id);
		$validated=$request->validate([
			'name' => 'required|string',
			'retailerid' => 'required|string',
			'dealerid' => 'required|string|exists:dealers',
			'address' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|string',
		]);
		$retailer->update($validated);
		return redirect()->route('createRetailer');

	}



	public function deleteRetailer($id){
		$retailer=Retailer::findOrFail($id);
		$retailer->delete();
		return redirect()->route('createRetailer');
	}





	function transfer(){
		return view('retailer.retailerproducttransfer');

	}

	function productreport(){
		return view('retailer.retailerproductreport');

	}
	function commission(){
		return view('retailer.retailercommission');

	}
	function stock(){
		return view('retailer.retailerstock');

	}


}
