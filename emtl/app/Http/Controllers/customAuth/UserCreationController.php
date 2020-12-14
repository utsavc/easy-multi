<?php

namespace App\Http\Controllers\customAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Dealer;
use App\Retailer;
use App\DealerLogin;
use App\RetailerLogin;

class UserCreationController extends Controller{


	public function createUserForm(){
		return view('admin.createuser');
	}
	


	function showDealer(){

		$dealer= Dealer::doesnthave('dealerLogin')->get();

		echo"<label>Select Dealer</label>";
		echo '<select class="form-control" >';
		foreach ($dealer as $dealer=>$val){
			echo "<option value='$val->id''>$val->name</option>";
		}
		echo "</select>";
	}



	function showRetailer(){

		$retailer= Retailer::doesnthave('retailerLogin')->get();
		
		echo"<label>Select Retailer</label>";
		echo '<select class="form-control" >';


		foreach ($retailer as $retailers=>$val){			
			echo "<option value='$val->id'>$val->name</option>";
		}
		echo "</select>";		
	}


}
