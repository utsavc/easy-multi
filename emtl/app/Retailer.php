<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    //

    protected $guarded = [];


	 public function dealer(){
        return $this->belongsTo('App\Dealer');
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
