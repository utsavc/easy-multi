<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [
        // add all other fields
    ];

    //Table name
    protected $table= 'users';

    //Primary key
    public $primaryKey= 'id';

    //Timestamps
    public $timestamps= true;
}
