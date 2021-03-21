<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFromUser extends Model
{
    
    protected $guarded = [];

    //Table name
    protected $table= 'productsfromcustomer';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
