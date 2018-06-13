<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifyUser extends Model
{
     protected $fillable = ['user_id','title','sender_name','subject','desc'];

}
