<?php

namespace App\Http\Controllers\customAuth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Dealer;
use App\Retailer;
use App\DealerLogin;
use App\RetailerLogin;
use App\Manager;

class UserCreationController extends Controller{


	public function createUserForm(){
		return view('admin.createuser');
	}


	public function createUser(Request $request){
		if ($request->userType=="retailer") {

			$validated=$request->validate([
				'retailer_id' => 'required|String|exists:retailers,id',
				'username' => 'required|String|unique:retailer_logins',
				'password' => 'required|String',
			]);

			RetailerLogin::create($validated);
			return back()->with('success','Retailer created successfully!');


		} else if($request->userType=="dealer") {

			$validated=$request->validate([
				'dealer_id' => 'required|String|exists:dealers,id',
				'username' => 'required|String|unique:dealer_logins',
				'password' => 'required|String',
			]);

			DealerLogin::create($validated);
			return back()->with('success','Dealer created successfully!');
		}else{
			abort(404);
		}		

	}


	function showDealersLogin(){
		

	}


	function showDealer(){

		$dealer= Dealer::doesnthave('dealerLogin')->get();


		if (count($dealer)==0) {
			
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>	All dealers have login</div>";
		} else {

			echo"<label>Select Dealer</label>";
			echo '<select class="form-control" name="dealer_id">';

			echo "<option>Choose Dealer</option>";
			foreach ($dealer as $dealer=>$val){
				echo "<option value='$val->id''>$val->name</option>";
			}
			echo "</select>";

			echo"<div class='form-group'>
			<label for='exampleInputEmail1'>Username</label>
			<input type='text' name='username' class='form-control' id='exampleInputEmail1' placeholder='Enter Username'>
			</div>

			<div class='form-group'>
			<label for='exampleInputPassword1'>Password</label>
			<input type='password' name='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			</div>

			<div class='form-group'>
			<label for='exampleInputPassword1'>Re-type Password</label>
			<input type='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			</div>

			<button type='submit' class='btn btn-primary'>Create</button> ";



		}		
	}



	function showRetailer(){

		$retailer= Retailer::doesnthave('retailerLogin')->get();

		if (count($retailer)==0) {
			
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>	All Retailer have login</div>";
		} else {

			echo"<label>Select Retailer</label>";
			echo '<select class="form-control" name="retailer_id">';

			echo "<option>Choose Retailer</option>";

			foreach ($retailer as $retailers=>$val){			
				echo "<option value='$val->id'>$val->name</option>";
			}
			echo "</select>";

			
			echo"<div class='form-group'>
			<label for='exampleInputEmail1'>Username</label>
			<input type='text' name='username' class='form-control' id='exampleInputEmail1' placeholder='Enter Username'>
			</div>

			<div class='form-group'>
			<label for='exampleInputPassword1'>Password</label>
			<input type='password' name='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			</div>

			<div class='form-group'>
			<label for='exampleInputPassword1'>Re-type Password</label>
			<input type='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
			</div>

			<button type='submit' class='btn btn-primary'>Create</button> ";

		}		
	}


	function dealerchangePasswordform(){
		return view("dealer.dealerchangepassword");
	}



	function retailerchangePasswordform(){
		return view("retailer.retailerchangepassword");
	}




	function adminchangePasswordform(){
		return view();
	}




	function dealerchangePassword(Request $request){


		$newpassword=$request->newpassword;
		$confirmpassword=$request->confirmpassword;

		if ($newpassword==$confirmpassword) {

			$currentPassword=$request->currentpassword;
			$users = DB::table('dealer_logins')
			->where('password', '=', $currentPassword)
			->where('id', '=', session('session_id'))
			->get();


			if (!empty($users[0])) {


				DB::table('dealer_logins')
				->where('id',session('session_id') )
				->update(['password' => $newpassword]);


				return back()->with("success","Password changed success");

			}else{

				return back()->with("danger","Old password is incorrect");
			}

		}else{

			return back()->with("danger","Password doesn't match");

		}

	}



	function retailerchangePassword(Request $request){

		$newpassword=$request->newpassword;
		$confirmpassword=$request->confirmpassword;

		if ($newpassword==$confirmpassword) {

			$currentPassword=$request->currentpassword;
			$users = DB::table('retailer_logins')
			->where('password', '=', $currentPassword)
			->where('id', '=', session('session_id'))
			->get();


			if (!empty($users[0])) {


				DB::table('retailer_logins')
				->where('id',session('session_id') )
				->update(['password' => $newpassword]);


				return back()->with("success","Password changed success");

			}else{

				return back()->with("danger","Old password is incorrect");
			}

		}else{

			return back()->with("danger","Password doesn't match");

		}

		//return $users;
	}




	function adminchangePassword(){

		$newpassword=$request->newpassword;
		$confirmpassword=$request->confirmpassword;

		if ($newpassword==$confirmpassword) {

			$currentPassword=$request->currentpassword;
			$users = DB::table('users')
			->where('password', '=', $currentPassword)
			->where('id', '=', session('session_id'))
			->get();


			if (!empty($users[0])) {


				DB::table('users')
				->where('id',session('session_id') )
				->update(['password' => $newpassword]);


				return back()->with("success","Password changed success");

			}else{

				return back()->with("danger","Old password is incorrect");
			}

		}else{

			return back()->with("danger","Password doesn't match");

		}
		
	}

	function createManagerForm(){
		$manager=Manager::all();
		return view('manager.createmanager',['managers'=>$manager,]);
	}


	function createManager(Request $request){
		$validated=$request->validate([
			'name' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
			'username'=>'required|string|unique:managers',
			'password'=>'required|string|confirmed',
			'role'=>'required|string'
		]);

		Manager::create($validated);
		return back()->with('success','Manager created successfully!');

	}

	function managerEdit($id, Request $request){
		$manager=Manager::findOrFail($id);
		return view('manager.editmanager',['manager'=>$manager,]);
	}


	public function managerDelete($id){
		$manager=Manager::findOrFail($id);
		$manager->delete();
		return redirect()->route('createManager')->with('success','Manager Deleted successfully!');;
	}



	function managerUpdate(Request $request, $id){
		$manager=Manager::findOrFail($id);
		$validated=$request->validate([
			'name' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
			'username'=>'required|string',
			'password'=>'required|string|confirmed'
		]);

		$manager->update($validated);
		return redirect()->route('createManager')->with('success','Manager updated successfully!');;
	}


}
