<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerCommission extends Model
{
    protected $fillable = [
        'dealerid',
        'productname',
        'quantity',
        'commission'
        // add all other fields
    ];

    //Table name
    protected $table= 'dealer_commissions';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
