<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    //

	protected $fillable = [
		'name', 'dealerid', 'address','phone','email'
	];



	public function retailer(){
		return $this->hasMany('App\Retailer');
	}



}
