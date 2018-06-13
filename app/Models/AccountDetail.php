<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model {

	protected $table = 'account_details';
	public $timestamps = true;
    protected $guarded = array();

     protected $fillable = ['user_id','account_first_name','account_last_name','account_middle_name', 'account_no', 'bank_name'];
     
     public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }

}