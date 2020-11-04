<?php

namespace App\Http\Controllers;

use App\Retailer;
use App\Group;
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
		return view('admin.groupdetails',['group'=>$group,]);
	}




	function addMembersForm(Request $request){
		return view('admin.addMembers');
	}
	

	function addMembers(Request $request){
	}







}
