<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitCoin extends Model {

	protected $table = 'bitcoins';
	public $timestamps = true;
    protected $guarded = array();


     public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }

}