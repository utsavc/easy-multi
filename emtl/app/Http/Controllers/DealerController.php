<?php

namespace App\Http\Controllers;
use App\Dealer;
use App\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DealerProduct;
use App\RetailerProduct;
use App\DealerComission;
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
use App\RetailerStock;

class DealerController extends Controller{

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
		$product= DealerStock::where('qty','<=',100)->where('dealer_id',session('session_id'))->get();
		$comission=DealerComission::where('dealer_id',session('session_id'))->sum('comission_amount');	
		return view('dealer.dashboard',['dealer'=>$dealer,'retailer'=>$retailer,'customer'=>$customer,'product'=>$product,'comission'=>$comission]);
	}


	function commission(){
		$commissions= DealerComission::where('dealer_id',session('session_id'))->get();
		return view('dealer.commission')->with('commissions', $commissions);
	}


	function stock(){
		$products= DealerStock::where('dealer_id',session('session_id'))->get();
		return view('dealer.stock')->with('products', $products);

	}


	function productreport(){
		return view('dealer.productreport');
	}


	function transferbyDealer(){
		$products= DealerStock::distinct()->get('product_id');
		$retailers= Retailer::where('dealer_id',session('session_id'))->get();
		return view('dealer.transfer',['products'=>$products,'retailers'=>$retailers]);
	}


	function createTransfer(Request $request){


		$validated=$request->validate([
			'product_id' => 'required|integer|exists:products,id',
			'qty' => 'required|integer',
			'dealer_id'=>'required|integer|exists:dealers,id',
			'retailer_id'=>'required|integer|exists:retailers,id',
		]);


		$retailerStock=RetailerStock::where('product_id',$request->product_id)->where('dealer_id',session('session_id'))->sum('qty');
		$dealerStock=DealerStock::where('product_id',$request->product_id)->where('dealer_id',session('session_id'))->sum('qty');

		$activeStock=$dealerStock-$retailerStock;

		if ($request->qty <= $activeStock) {
			RetailerStock::create($validated);
			return back()->with('success','Product Transferred to Retailer stock successfully!');
		}else{			
			return back()->with('error','You are trying to enter maximum value than available stock');
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
