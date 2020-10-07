<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
		'name','customerid','retailerid', 'address','phone','email'
	];


	 public function retailer(){
        return $this->belongsTo('App\Retailer','id');
    }

}
