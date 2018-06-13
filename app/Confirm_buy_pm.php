<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm_buy_pm extends Model
{
     protected $fillable = ['user_id','date_sent', 'details_no', 'amount_paid', 'depositor_name', 'receipt_dir', 'perfect_money_id'];
}
