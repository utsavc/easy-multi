<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public $table = 'user_groups';

	protected $guarded = [];

	public function retailer()
	{
		return $this->belongsTo('App\Retailer');
	}

}
