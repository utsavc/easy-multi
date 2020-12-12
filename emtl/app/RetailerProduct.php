<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailerProduct extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'retailerid'
        // add all other fields
    ];

    //Table name
    protected $table= 'retailer_products';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
