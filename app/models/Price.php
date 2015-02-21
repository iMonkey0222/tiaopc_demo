<?php

class Price extends Eloquent {


	protected $table = 'price';

	// only price can be called, id cannot be call directly called by , can noly be access database
	protected $fillable = ['price'];

	public function items()
	{
		return $this->belongsTo('Item');
	}
}