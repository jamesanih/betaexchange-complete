<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm_sell_pm extends Model
{
    protected $fillable = ['user_id','date_sent', 'batch_number', 'amount_sent', 'wallet_id', 'purchase_perfect_money_id'];
}
