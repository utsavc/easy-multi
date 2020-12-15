<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Retailer;
use App\Group;
use App\Customer;
use App\CustomerGroups;
use App\GroupDeposit;

class GroupController extends Controller
{


	//creating group form
	function createGroupForm(){
		$retailers=Retailer::findorFail(session('session_id'));
		$groups=Group::where('retailer_id',session('session_id'))->get();
		return view('groups.creategroup',['retailers'=>$retailers,'groups'=>$groups]);
	}

	//creating group for retailers
	function createGroup(Request $request){
		$validated=$request->validate([
			'name' => 'required|String',			
			'retailer_id' => 'required|integer|exists:retailers,id',
		]);
		Group::create($validated);
		return back()->with('success','Group Created successfully!');
	}


	//Showing grouup details
	function groupDetails(Request $request, $id){
		$group=Group::findorFail($id);
		$customerGroup=CustomerGroups::where('group_id',$id)->get();
		$customer=Customer::all();
		$groupDeposit= GroupDeposit::where('group_id',$id)->get()->sum('amount');
		return view('groups.groupdetails',['group'=>$group,'customerGroup'=>$customerGroup,'groupDeposit'=>$groupDeposit,'customers'=>$customer]);
	}



	//showing Form
	function addMembersForm(Request $request){
		$retailers=Retailer::all();
		$groups=Group::all();
		$customers=Customer::where('retailer_id',session('session_id'))->get();
		
		return view('groups.addMembers',['customers'=>$customers,'groups'=>$groups]);
	}
	

	//Adding Members in Group

	function addMembers(Request $request){
		$limit=15;

		$validated=$request->validate([
			'customer_id' => 'required|String|exists:customers,id|unique:customer_groups',			
			'group_id' => 'required|integer|exists:user_groups,id',
		]);

		$id=$request->group_id;

		$count = CustomerGroups::where('group_id',$id)->get()->count();	

		if ($count<$limit) {

			CustomerGroups::create($validated);
			return back()->with('success','Member Added successfully!');
		}else{
			return back()->with('danger','Member Exceeds in the Group!');

		}
	}



}
