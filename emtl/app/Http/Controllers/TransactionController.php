<?php

namespace App\Http\Controllers;
use App\Retailer;
use App\Group;
use App\Customer;
use App\CustomerGroups;
use App\Deposit;
use App\Withdraw;
use App\GroupDeposit;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
	


	function deposit(){
		$customer = Customer::all();
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
		$customer = Customer::all();
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
		$customer = Customer::all();
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

		return view('transaction.viewreport',['deposit'=>$deposit, 'withdraw'=>$withdraw,'balance'=>$balance]);


	}


	function transfer(){
		$customer = Customer::all();
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
		$group_id= $groups_id->group_id;

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


	function adminComission(){
		$customer = Customer::all();
		return view('admin.transaction.report',['customer'=>$customer]);
	}



	function adminReport(){
		$customer = Customer::all();
		return view('admin.transaction.report',['customer'=>$customer]);		
	}


}
