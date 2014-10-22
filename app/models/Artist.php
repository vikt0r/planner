<?php

class Artist extends \Eloquent {
	protected $fillable = ['name', 'about'];

	protected $softDelete = true;

	public function gaan()
	{
		return $this->hasMany('Gaan');
	}
}