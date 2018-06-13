<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm_buy_bitcoins extends Model
{
    protected $fillable = ['user_id','date_sent', 'transfer_details', 'amount_paid', 'depositor_name', 'receipt_dir', 'bitcoin_id'];

}
