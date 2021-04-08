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
use App\DealerComission;
use App\CustomerComission;
use App\RetailerComission;
use App\Product;
use App\CustomerGroups;
use App\DealerStock;
use App\RetailerStock;
use App\Deposit;
use App\Group;
use App\GroupAccount;
use App\GroupDeposit;
use App\ProductStocks;
use App\User;
use App\Withdraw;
use App\CustomerPurchase;
use App\ProductFromUser;

class RetailerController extends Controller{


	function dashboard(){		
		$customerGroups= Group::where('retailer_id',session('session_id'))->get();
		$dealer= Group::where('retailer_id',session('session_id'))->get();
		$retailer= Retailer::where('dealer_id',session('session_id'))->get();
		$customer= Customer::where('retailer_id',session('session_id'))->get();
		$product= DealerStock::where('dealer_id',session('session_id'))->distinct('product_id');
		return view('retailer.dashboard',['dealer'=>$dealer,'retailer'=>$retailer,'customer'=>$customer,'product'=>$product,'customerGroups'=>$customerGroups]);
	}



	function createRetailer(){
		$retailer=Retailer::orderBy('id','DESC')->get();
		$dealer=Dealer::where('status','active')->get();
		return view('admin.createretailer',['retailers'=>$retailer,'dealers'=>$dealer]);
	}


	function addRetailer(Request $request){
		$validated=$request->validate([
			'name' => 'required|string',
			'retailerid' => 'required|string|unique:retailers',
			'dealer_id' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
		]);

		
		Retailer::create($validated);
		return back()->with('success','Item created successfully!');

	}


	public function editRetailer($id, Request $request){
		$retailer=Retailer::firstWhere('id', $id);	

		$dealer=Dealer::orderBy('id','DESC')->get();
		$allretailer=Retailer::orderBy('id','DESC')->get();
		return view('admin.editretailer',['retailer'=>$retailer,'allretailer'=>$allretailer,'dealers'=>$dealer]);
	}



	public function updateRetailer($id, Request $request){

		$retailer=Retailer::findOrFail($id);
		$validated=$request->validate([
			'name' => 'required|string',
			'retailerid' => 'required|string',
			'dealer_id' => 'required|string|exists:dealers,id',
			'address' => 'required|string',
			'phone' => 'required|string',
		]);
		$retailer->update($validated);
		return redirect()->route('createRetailer')->with('success','Updated successfully!');

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

		$products= RetailerStock::where('retailer_id',session('session_id'))->distinct()->get('product_id');
		$customer= Customer::where('retailer_id',session('session_id'))->get();
		return view('retailer.transfer',['products'=>$products,'customers'=>$customer]);


	}

	function sellProduct(Request $request){

		$validated=$request->validate([
			'product_id' => 'required|integer|exists:products,id',
			'qty' => 'required|integer',
			'customer_id'=>'required|integer|exists:customers,id',
			'retailer_id'=>'required|integer|exists:retailers,id',
		]);

		$product=Product::findOrFail($request->product_id);
		$dealer_id=Retailer::findOrFail($request->retailer_id)->dealer_id;


		$customer_id=$request->customer_id;
		$customer=CustomerGroups::where('customer_id',$customer_id)->get();
		$group_id= $customer[0]->group_id;

		if (count($customer)<=0) {
			return back()->with('danger',"Customer should be in group");
		}

		$price=Product::findOrFail($request->product_id)->mrp;
		$productAmount= $request->qty * $price;
		

		//$validated['amount']=$productAmount;

		$amtInGroup=GroupDeposit::where('customer_id',$customer_id)->sum('amount');
		$usedAmount=CustomerPurchase::where('group_id',$group_id)->sum('group_amount');

		$requiredAmount= (35/100) * $productAmount;

		$validated['group_id'] = $group_id;
		$amountFromGroup=$productAmount-$amtInGroup;

		if ($amountFromGroup<0) {
			$validated['group_amount']=0;
		}else{
			$validated['group_amount']=$amountFromGroup;
		}


		$validated['customer_amount']=(int)$amtInGroup;


		if ($amtInGroup >= $requiredAmount) {
			$id=CustomerPurchase::create($validated)->id;


			$customerComission = new CustomerComission;
			$customerComission->customer_id=$customer_id;
			$customerComission->purchase_id=$id;
			$customerComission->comission_amount=$product->customerComission;



			$dealerComission = new DealerComission;
			$dealerComission->dealer_id=$dealer_id;	
			$dealerComission->purchase_id=$id;
			$dealerComission->comission_amount=$product->dealerComission;




			$retailerComission = new RetailerComission;
			$retailerComission->retailer_id=session('session_id');	
			$retailerComission->purchase_id=$id;
			$retailerComission->comission_amount=$product->retailerComission;


			$customerComission->save();
			$retailerComission->save();
			$dealerComission->save();

			return back()->with("success", "Product has been sold");
		}else{
			return back()->with("danger","Customer has insufficient Amount");
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
		$customerproduct= CustomerProduct::findOrFail($id);
		$retailerproduct= RetailerProduct::firstWhere('name', $customerproduct->name);

		if(count($retailerproduct) > 0){
			$finalquantity= $retailerproduct->quantity + $customerproduct->quantity;
			$retailerproduct->update(array('quantity' => $finalquantity));
			$customerproduct->delete();		
		} else{
			$retailer = new RetailerProduct;
			$retailer->name= $customerproduct->name;
			$retailer->dealerid= $customerproduct->dealerid;
			$retailer->quantity= $customerproduct->quantity;
			$retailer->date= $customerproduct->date;
			$retailer->save();
			$customerproduct->delete();
		}

		return redirect()->route('createTransfer');
	}


	function commission(){
		$commissions= RetailerComission::orderBy('id','DESC')->get();
		return view('retailer.retailercommission')->with('commissions', $commissions);

	}

	function stock(){
		$products= RetailerProduct::orderBy('id','DESC')->get();
		return view('retailer.retailerstock')->with('products', $products);

	}

	function purchase(){	
		$products= RetailerStock::where('retailer_id',session('session_id'))->distinct()->get('product_id');
		$customer= Customer::where('retailer_id',session('session_id'))->get();
		return view('retailer.purchase',['products'=>$products,'customers'=>$customer]);

	}

	function processPurchase(Request $request){	

		$validated=$request->validate([
			'customer_id' => 'required|string|exists:customers,id',
			'retailer_id' => 'required|string|exists:retailers,id',
			'product_name' => 'required|string',
			'quantity' => 'required|string',
			'amount' => 'required|string',
		]);
		
		ProductFromUser::create($validated);		
		return back()->with("success", "Product has been purchased");
	}



	function purchaseForm(){
		$customer= Customer::where('retailer_id',session('session_id'))->get();
		return view('retailer.checkpurchase',['customers'=>$customer]);

	}

	function purchaseReport(Request $request){
		$id=$request->customer_id;
		$products= ProductFromUser::where('customer_id',$id)->get();
		//return $products;
		return view('retailer.purchasereport',['products'=>$products]);

	}



}
