<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm_sell_bitcoin extends Model
{
    protected $fillable = ['user_id','date_sent', 'hash', 'amount_sent', 'wallet_id', 'purchase_bitcoins_id'];
}
