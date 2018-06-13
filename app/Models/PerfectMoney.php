<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfectMoney extends Model {

	protected $table = 'perfect_money';
	public $timestamps = true;
    protected $guarded = array();


     public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }

}