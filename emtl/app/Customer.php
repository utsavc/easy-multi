<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $guarded = [];

	public function retailer()
	{
		return $this->belongsTo('App\Retailer');
	}


	public function customerGroups()
	{
		return $this->belongsTo('App\CustomerGroups');
	}	



	public function customerPurchase(){
		return $this->hasMany('App\CustomerPurchase');
	}



}
