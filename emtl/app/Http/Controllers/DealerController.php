<?php

namespace App\Http\Controllers;
use App\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealerController extends Controller
{

	function createDealerForm(){
		$dealer=Dealer::orderBy('id','DESC')->get();
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

		/*$dealer= new Dealer;
		$dealer->name=$request->name;
		$dealer->dealerid=$request->dealerid;
		$dealer->address=$request->address;
		$dealer->phone=$request->phone;
		$dealer->email=$request->email;
		$dealer->updateorCreate();		*/

		Dealer::create($validated);
		return back()->with('success','Item created successfully!');
	}

	function editDealer($id, Request $request){
		$dealer=Dealer::firstWhere('id', $id);	
		$alldealer=Dealer::orderBy('id','DESC')->get();
		return view('admin.editdealer',['dealer'=>$dealer,'alldealer'=>$alldealer]);
	}


	function updateDealer(Request $request, $id){
		$dealer = Dealer::findOrFail($id);
		$validated=$request->validate([
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
		$dealer=Dealer::findOrFail($id);
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
		return view('dealer.index');
	}



	function commission(){
		return view('dealer.commission');
	}

	function stock(){
		return view('dealer.stock');
	}

	function productreport(){
		return view('dealer.productreport');
	}


	function transferbyDealer(){
		return view('dealer.transfer');
	}


}
