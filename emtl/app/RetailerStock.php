<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailerStock extends Model
{
    //

	protected $guarded = [];

	public function product(){
		return $this->belongsTo('App\Product');
	}

	public function retailer(){
		return $this->belongsTo('App\Retailer');
	}
}
