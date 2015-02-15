<?php

class Price extends Eloquent {


	protected $table = 'price';

	protected $fillable = ['price'];

	public function items()
	{
		return $this->belongsTo('Item');
	}
}