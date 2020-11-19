<?php

namespace SimpleMVC\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	public $timestamps = false;

	public function articles()
	{
		return $this->hasMany('SimpleMVC\Model\Article');
	}
}
