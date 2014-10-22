<?php

class Role extends \Eloquent {
	protected $fillable = [];

	public function users()
	{
		$this->hasMany('User');
	}
	
	
}