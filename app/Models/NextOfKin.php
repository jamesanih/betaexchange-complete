<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model {

	protected $table = 'next_kins';
	public $timestamps = true;
    protected $guarded = array();


    public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }

}