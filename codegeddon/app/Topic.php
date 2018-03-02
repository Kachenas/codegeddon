<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
   function show_topics(){
	    return $this->hasMany('App\Topic', 'topic_cat');
	}

	function user_topic(){
	    return $this->belongsTo('App\User', 'topic_by', 'id');
	}

	public function comments() {
		return $this->hasMany('App\Post');
	}

}
