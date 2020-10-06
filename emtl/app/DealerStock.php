<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerStock extends Model
{

	
	protected $guarded = [];

	public function product(){
		return $this->belongsTo('App\Product');
	}

	public function dealer(){
		return $this->belongsTo('App\Dealer');
	}
	
}
