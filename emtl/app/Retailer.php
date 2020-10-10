<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    //

    protected $fillable = [
		'name','retailerid','dealerid', 'address','phone','email'
	];


	 public function dealer(){
        return $this->belongsTo('App\Dealer','id');
    }


      public function group()
    {
        return $this->hasMany('App\Group');
    }



      public function customer()
    {
        return $this->hasMany('App\Customer');
    }



}
