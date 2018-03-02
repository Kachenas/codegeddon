<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function post() {
    	return $this->belongsTo('App\Post');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    function user_post(){
	    return $this->belongsTo('App\User', 'post_by');
	}

}
