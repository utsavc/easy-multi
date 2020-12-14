<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerLogin extends Model
{
	protected $guarded=[];


	public function dealer(){
		return $this->belongsTo('App\Dealer');
	}

}
