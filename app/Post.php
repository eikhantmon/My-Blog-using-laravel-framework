<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'user_id',
	    'cover',
	    'title',
	    'slug',
	    'pre_description',
	    'description',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
    
}
