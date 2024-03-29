<?php

namespace App\Http\Controllers;
use App\Retailer;
use App\Dealer;
use App\Group;
use App\Customer;
use App\CustomerGroups;
use App\Deposit;
use App\Withdraw;
use App\GroupDeposit;
use App\RetailerComission;
use App\DealerComission;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
	


	function deposit(){
		$customer = Customer::where('retailer_id',session('session_id'))->get();


		return view('transaction.deposit',['customer'=>$customer]);
	}



	function processDeposit(Request $request){
		$validated=$request->validate([
			'customer_id' => 'required|integer|exists:customers,id',	
			'amount' => 'required|integer|',			
		]);	

		Deposit::create($validated);		
		return back()->with('success','Deposited successfully!');
	}




	function withdraw(){
		$customer =  Customer::where('retailer_id',session('session_id'))->get();
		return view('transaction.withdraw',['customer'=>$customer]);
	}


	function processWithdraw(Request $request){

		$validated=$request->validate([
			'customer_id' => 'required|integer|exists:customers,id',	
			'amount' => 'required|integer|',			
		]);	
		$customer_id= $request->customer_id;
		$withdrawlAmount= $request->amount;

		$totalDeposit = Deposit::where('customer_id',$customer_id)->sum('amount');
		$totalWithdrawl = Withdraw::where('customer_id',$customer_id)->sum('amount');

		$balance= $totalDeposit-$totalWithdrawl;


		if ($withdrawlAmount > $balance  ) {
			return back()->with('danger','Withdrawl Amount Exceeds the balance Amount!');
		}else{
			Withdraw::create($validated);		
			return back()->with('success','Amount Withdrawn successfully!');
		}
	}



	function report(){
		$customer = Customer::where('retailer_id',session('session_id'))->get();
		if (session('role')=='Admin') {
			return view('admin.transaction.deposit',['customer'=>$customer]);	
		}
		return view('transaction.report',['customer'=>$customer]);
	}


	function processReport(Request $request){
		$validated=$request->validate([
			'customer_id' => 'required|integer|exists:customers,id',
		]);	

		$customer_id=$request->customer_id;
		$deposit = Deposit::where('customer_id',$customer_id)->orderBy('id','desc')->get();
		$withdraw = Withdraw::where('customer_id',$customer_id)->get();	

		$balance=$this->getBalance($customer_id);

		$groupBalance=$this->getBalanceinGroup($customer_id);

		if (session('role')=='Admin') {
			
			return view('admin.transaction.viewreport',['groupBalance'=>$groupBalance,'deposit'=>$deposit, 'withdraw'=>$withdraw,'balance'=>$balance]);
		}

		return view('transaction.viewreport',['groupBalance'=>$groupBalance,'deposit'=>$deposit, 'withdraw'=>$withdraw,'balance'=>$balance]);
	}

	


	function transfer(){
		$customer = Customer::where('retailer_id',session('session_id'))->get();
		return view('transaction.transfer',['customer'=>$customer]);
	}



	function processTransfer(Request $request){

		$validated=$request->validate([
			'customer_id' => 'required|integer|exists:customers,id',
			'amount' => 'required|integer|',			
		]);	

		$customer_id= $request->customer_id;

		$transferAmount= $request->amount;
		$groups_id=CustomerGroups::firstorFail()->where('customer_id',$customer_id)->get();



		if ($groups_id->isEmpty()) {
			return back()->with('danger','Customer is not in Group!');
		}


		//dd($groups_id->group_id);
		$group_id= $groups_id[0]->group_id;

		$validated['group_id']=$group_id;

		$totalDeposit = Deposit::where('customer_id',$customer_id)->sum('amount');
		$totalWithdrawl = Withdraw::where('customer_id',$customer_id)->sum('amount');
		$totalTransferred=GroupDeposit::where('customer_id',$customer_id)->sum('amount');


		$balance= $totalDeposit-$totalWithdrawl-$totalTransferred;
		
		if ($balance > $transferAmount ) {

			GroupDeposit::create($validated);
			return back()->with('success','Amount transferred successfully!');
		}else{
			return back()->with('danger','Cannot Transfer Excessive Amount!');
		}

	}


	function getBalance($customer_id){


		$totalDeposit = Deposit::where('customer_id',$customer_id)->sum('amount');
		$totalWithdrawl = Withdraw::where('customer_id',$customer_id)->sum('amount');
		$totalTransferred=GroupDeposit::where('customer_id',$customer_id)->sum('amount');

		$balance= $totalDeposit-$totalWithdrawl-$totalTransferred;
		return $balance;
	}


	function getBalanceinGroup($customer_id){

		$totalDeposit = GroupDeposit::where('customer_id',$customer_id)->sum('amount');

		return $totalDeposit;

	}


	function adminComission(){
		$customer = Customer::all();
		return view('admin.transaction.report',['customer'=>$customer]);
	}

	function customerReport(){
		$customer = Customer::all();
		return view('admin.transaction.customerreport',['customer'=>$customer]);		
	}

	function retailerReport(){
		$retailer = Retailer::all();
		return view('admin.transaction.report',['retailer'=>$retailer]);		
	}


	function retailerComissionReport(Request $request){
		$validated=$request->validate([
			'retailer_id' => 'required|integer|exists:retailers,id',
		]);	

		$report= RetailerComission::where('retailer_id',$request->retailer_id)->sum('comission_amount');

		return view('admin.transaction.retailercomissionreport',['report'=>$report]);
	}


	function dealerReport(){
		$dealer = Dealer::all();
		return view('admin.transaction.dealerreport',['dealer'=>$dealer]);		
	}


	function dealerComissionReport(Request $request){
		$validated=$request->validate([
			'dealer_id' => 'required|integer|exists:dealers,id',
		]);	

		$report= DealerComission::where('dealer_id',$request->dealer_id)->sum('comission_amount');

		return view('admin.transaction.dealercomissionreport',['report'=>$report]);
	}





}
