<?php


class Item extends Eloquent {
	protected $fillable = [];


	/**
	 * [pictures description]
	 * @return [type] [description]
	 */
	public function pictures()
	{
		return $this->hasMany('Picture');

	}


	public function prices()
	{
		return $this->hasMany('Price');
	}

	public function transactions()
	{
		return $this->hasMany('Transaction');
	}

}