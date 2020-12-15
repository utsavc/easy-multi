<?php

namespace App\Http\Controllers;
use App\Dealer;
use App\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DealerProduct;
use App\RetailerProduct;
use App\DealerCommission;
use App\Product;
use App\Customer;
use App\CustomerGroups;
use App\DealerStock;
use App\Deposit;
use App\Group;
use App\GroupAccount;
use App\GroupDeposit;
use App\ProductStocks;
use App\User;
use App\Withdraw;

class DealerController extends Controller
{

	function createDealerForm(){
		$dealer= Dealer::orderBy('id','DESC')->get();
		return view('admin.createdealer',['dealers'=>$dealer]);
	}


	function addDealer(Request $request){

		$validated=$request->validate([
			'name' => 'required|string',
			'dealerid' => 'required|string|unique:dealers',
			'address' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|string',
		]);

		/* $dealer = new Dealer;
		$dealer->name=$request->name;
		$dealer->dealerid=$request->dealerid;
		$dealer->address=$request->address;
		$dealer->phone=$request->phone;
		$dealer->email=$request->email;
		$dealer->updateorCreate();	*/

		Dealer::create($validated);
		return back()->with('success','Item created successfully!');
	}

	function editDealer($id, Request $request){
		$dealer= Dealer::firstWhere('id', $id);	
		$alldealer= Dealer::orderBy('id','DESC')->get();
		return view('admin.editdealer',['dealer'=>$dealer,'alldealer'=>$alldealer]);
	}


	function updateDealer(Request $request, $id){
		$dealer= Dealer::findOrFail($id);
		$validated= $request->validate([
			'name' => 'required|string',
			'dealerid' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|string',
		]);
		$dealer->update($validated);
		return redirect()->route('createDealer');
	}


	function deleteDealer($id){
		$dealer= Dealer::findOrFail($id);
		$status=$dealer->status;
		if ($status=="active") {
			$dealer->status="inactive";

		}else{
			$dealer->status="active";

		}
		$dealer->save();
		return redirect()->route('createDealer');
	}


	function dashboard(){
		$dealer= Dealer::all();
		$retailer= Retailer::where('dealer_id',session('session_id'))->get();
		$customer= Customer::all();
		$product= DealerStock::where('dealer_id',session('session_id'))->distinct('product_id');
		return view('dealer.dashboard',['dealer'=>$dealer,'retailer'=>$retailer,'customer'=>$customer,'product'=>$product]);
	}


	function commission(){
		$commissions= DealerCommission::orderBy('id','DESC')->get();
		return view('dealer.commission')->with('commissions', $commissions);
	}


	function stock(){
		$products= DealerProduct::orderBy('id','DESC')->get();
		return view('dealer.stock')->with('products', $products);
	}


	function productreport(){
		return view('dealer.productreport');
	}


	function transferbyDealer(){
		$products= Product::orderBy('id','DESC')->get();
		$stocks= DealerProduct::orderBy('id','DESC')->get();
		$retailers= Retailer::where('dealer_id',session('session_id'))->get();
		$products= [$stocks, $retailers, $products];
		return view('dealer.transfer')->with('products', $products);
		
	}


	function createTransfer(Request $request){

		$validated= $request->validate([
			'name' => 'required|string',
			'quantity' => 'required|string',
			'retailerid' => 'required|string',
			'date' => 'required|string'
		]);

		$dealerproduct= DealerProduct::orderBy('id','DESC')->where('name', $request->name)->first();
		$checkdataexistance= RetailerProduct::orderBy('id','DESC')->where('name', $request->name)->get();

		if ($request->quantity <= $dealerproduct->quantity){
			if(count($checkdataexistance) == 0){
				RetailerProduct::create($validated);
				$dealerproduct->update(array('quantity' => $dealerproduct->quantity - $request->quantity));
				return back()->with('success', 'Item created successfully!');
			} else{
				return back()->with('errors', 'Product name already exist!');
			}
		} else{
			return back()->with('errors', 'Quantity should be in range of 1 to '.$dealerproduct->quantity.'for '.$request->name.'.');
		}
	
	}


	function editTransfer($id, Request $request){
		$retailer= RetailerProduct::firstWhere('id', $id);	
		$allretailer= RetailerProduct::orderBy('id','DESC')->get();

		return view('dealer.edittransferproduct', ['retailer'=>$retailer,'allretailer'=>$allretailer]);
	}


	function updateTransfer($id, Request $request){
		$retailer= RetailerProduct::findOrFail($id);

		$dealerproduct= DealerProduct::firstWhere('name', $request->name);

		if (($request->quantity - $customer->quantity) <= $dealerproduct->quantity){
			$finalquantity= $dealerproduct->quantity - ($request->quantity - $retailer->quantity);
			$retailer->update(array('quantity' => $request->quantity));
			$dealerproduct->update(array('quantity' => $finalquantity));
			return redirect('dealer/transfer')->with('success', 'Item updated successfully!');
		} else{
			return redirect()->route('transferproductEdit')->with('errors', 'Quantity should be in range of 1 to '.$dealerproduct->quantity.'for '.$request->name.'.');
		}
	}


	function deleteTransfer($id){
		$retailerproduct= RetailerProduct::findOrFail($id);
		$dealerproduct= DealerProduct::firstWhere('name', $retailerproduct->name);

		if(count($dealerproduct) > 0){
			$finalquantity= $dealerproduct->quantity + $retailerproduct->quantity;
			$dealerproduct->update(array('quantity' => $finalquantity));
			$retailerproduct->delete();		
		} else{
			$dealer = new DealerProduct;
			$dealer->name= $retailerproduct->name;
			$dealer->dealerid= $retailerproduct->dealerid;
			$dealer->quantity= $retailerproduct->quantity;
			$dealer->date= $retailerproduct->date;
			$dealer->save();
			$retailerproduct->delete();
		}

		return redirect()->route('createTransfer');
	}

	
	function profile()	{
		return view('dealer.profile');
	}


}
