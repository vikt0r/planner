<?php

class Document extends \Eloquent {

	protected $fillable = ['name', 'about'];


	protected $softDelete = true;


	// RELATIONS

	public function user()
	{
		return $this->belongsTo('User');
	}


	//#RELATIONS
}
