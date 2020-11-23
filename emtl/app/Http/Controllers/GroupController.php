<?php

namespace App\Http\Controllers;

use App\Retailer;
use App\Group;
use App\Customer;
use App\CustomerGroups;
use Illuminate\Http\Request;

class GroupController extends Controller
{

	function createGroupForm(){

		$retailers=Retailer::all();
		$groups=Group::all();
		return view('admin.creategroup',['retailers'=>$retailers,'groups'=>$groups]);
	}


	function createGroup(Request $request){

		$validated=$request->validate([
			'name' => 'required|String',			
			'retailer_id' => 'required|integer|exists:retailers,id',
		]);

		//dd($validated);

		Group::create($validated);
		return back()->with('success','Group Created successfully!');

	}


	function groupDetails(Request $request, $id){
		$group=Group::findorFail($id);
		$customer_groups = CustomerGroups::where('group_id', $id)->get();

		return view('admin.groupdetails',['group'=>$group,'customer_groups'=>$customer_groups,]);
	}




	function addMembersForm(Request $request){

		$retailers=Retailer::all();
		$groups=Group::all();
		$customers=Customer::all();
		return view('admin.addMembers',['customers'=>$customers,'groups'=>$groups]);
	}
	

	function addMembers(Request $request){
		$validated=$request->validate([
			'customer_id' => 'required|String|exists:customers,id|unique:customer_groups',			
			'group_id' => 'required|integer|exists:user_groups,id',
		]);

		CustomerGroups::create($validated);

		return back()->with('success','Member Added successfully!');


	}







}
