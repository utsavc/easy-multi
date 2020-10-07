<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Retailer;
use App\Dealer;
use App\Customer;
use App\DealerProduct;
use App\RetailerProduct;
use App\CustomerProduct;

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



	function productreport(){
		$products= RetailerProduct::orderBy('id','DESC')->get();
		return view('retailer.retailerproductreport')->with('products', $products);

	}
 
	function transfer(){
		$products= CustomerProduct::orderBy('id','DESC')->get();
		$stocks= RetailerProduct::orderBy('id','DESC')->get();
		$customers= Customer::orderBy('id','DESC')->get();

		$products= [$stocks, $customers, $products];
		return view('retailer.retailerproducttransfer')->with('products', $products);

	}

	function createTransfer(Request $request){

		$validated= $request->validate([
			'name' => 'required|string',
			'quantity' => 'required|string',
			'price' => 'required|string',
			'customerid' => 'required|string',
			'date' => 'required|string'
		]);

		$retailerproduct= RetailerProduct::orderBy('id','DESC')->where('name', $request->name)->first();
		$checkdataexistance= CustomerProduct::orderBy('id','DESC')->where('name', $request->name)->get();

		if ($request->quantity <= $retailerproduct->quantity) {
			if(count($checkdataexistance) == 0) {
				CustomerProduct::create($validated);
				$retailerproduct->update(array('quantity' => $retailerproduct->quantity - $request->quantity));
				return back()->with('success', 'Item created successfully!');
			} else{
				return back()->with('errors', 'Product name already exist!');
			}
		} else{
			return back()->with('errors', 'Quantity should be in range of 1 to '.$retailerproduct->quantity.'for '.$request->name.'.');
		}
	
	}


	function editTransfer($id, Request $request){
		$customer= CustomerProduct::firstWhere('id', $id);	
		$allcustomer= CustomerProduct::orderBy('id','DESC')->get();

		return view('retailer.edittransferproduct', ['customer'=>$customer,'allcustomer'=>$allcustomer]);
	}


	function updateTransfer($id, Request $request){
		$customer= CustomerProduct::findOrFail($id);

		$retailerproduct= RetailerProduct::firstWhere('name', $request->name);

		if (($request->quantity - $customer->quantity) <= $retailerproduct->quantity){
			$finalquantity= $retailerproduct->quantity - ($request->quantity - $customer->quantity);
			$customer->update(array('quantity' => $request->quantity));
			$retailerproduct->update(array('quantity' => $finalquantity));
			return redirect('retailer/transfer')->with('success', 'Item updated successfully!');
		} else{
			return redirect()->route('transferproductEdit')->with('errors', 'Quantity should be in range of 1 to '.$retailerproduct->quantity.'for '.$request->name.'.');
		}
	}


	function deleteTransfer($id){
		$customer= CustomerProduct::findOrFail($id);

		$customer->delete();

		return redirect()->route('createTransfer');
	}


	function commission(){
		$commissions= DealerCommission::orderBy('id','DESC')->get();
		return view('retailer.retailercommission')->with('commissions', $commissions);

	}

	function stock(){
		$products= RetailerProduct::orderBy('id','DESC')->get();
		return view('retailer.retailerstock')->with('products', $products);

	}

	function profile()	{
		return view('retailer.profile');
	}

}
