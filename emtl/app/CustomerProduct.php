<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'customerid'
        // add all other fields
    ];

    //Table name
    protected $table= 'customer_products';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
