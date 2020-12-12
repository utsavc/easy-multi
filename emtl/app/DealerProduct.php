<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerProduct extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'dealerid'
        // add all other fields
    ];

    //Table name
    protected $table= 'dealer_products';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
