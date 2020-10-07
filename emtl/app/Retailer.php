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



}
