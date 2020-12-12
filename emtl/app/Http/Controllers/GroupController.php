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
		return view('groups.creategroup',['retailers'=>$retailers,'groups'=>$groups]);
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
		$customerGroup=CustomerGroups::where('group_id',$id)->get();
		return view('groups.groupdetails',['group'=>$group,'customerGroup'=>$customerGroup]);
	}




	function addMembersForm(Request $request){
		$retailers=Retailer::all();
		$groups=Group::all();
		$customers=Customer::all();
		return view('groups.addMembers',['customers'=>$customers,'groups'=>$groups]);
	}
	

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
