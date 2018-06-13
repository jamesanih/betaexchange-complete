<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model {

	protected $table = 'blog_posts';
	public $timestamps = true;
    protected $guarded = array();
    


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    
    public function comments()
    {
        return $this->hasMany('App\Models\BlogComment','post_id');
    }

}