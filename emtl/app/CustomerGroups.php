<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGroups extends Model
{
    
	public function group(){
		return $this->belongsTo('App\Group');
	}

	public function customer(){
		return $this->hasMany('App\Customer');
	}
	

}
