<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	function show_topics(){
	    return $this->hasMany('App\Topic', 'topic_cat');
	}
}
