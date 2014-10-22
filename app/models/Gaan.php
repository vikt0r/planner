<?php

class Gaan extends \Eloquent {
	
	protected $fillable = ['name', 'about'];


	protected $softDelete = true;


	// RELATIONS

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

	public function album()
	{
		return $this->belongsTo('Album');
	}

	// public function album()
	// {
	// 	return $this->hasOne('Album');
	// }

	//#RELATIONS
}