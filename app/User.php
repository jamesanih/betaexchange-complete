<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','first_name','middle_name','last_name','phone_no', 'email', 'password','verify_code', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];


    public function next_kin()
    {
        return $this->hasOne('App\Models\NextOfKin');
    }


    public function account_detail()
    {
        return $this->hasOne('App\Models\AccountDetail');
    }

    public function bitcoins()
    {
        return $this->hasMany('App\Models\Bitcoin');
    }


    public function perfect_money()
    {
        return $this->hasMany('App\Models\PerfectMoney');
    }

                  /**
     * Get the comments for the blog post.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\BlogPost');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\BlogComment');
    }

}
