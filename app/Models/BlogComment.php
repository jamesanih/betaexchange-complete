<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BlogComment extends Model {

	protected $table = 'blog_comments';
	public $timestamps = true;
    protected $guarded = array();
    




         /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\BlogPost','post_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}