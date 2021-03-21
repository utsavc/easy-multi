<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $guarded = [];


    public function productStocks()
    {
        return $this->hasMany('App\ProductStocks');
    }



    public function dealerStocks()
    {
        return $this->hasMany('App\DealerStock');
    }





}
