<?php

class Transaction extends Eloquent {

	protected $table = 'transactions';

	protected $fillable = array('item_id','buyer_id', 'status');

	public function items()
	{
		return $this->belongsTo('Item');
	}

	public function buyers()
	{
		return $this->belongsTo('User');
	}

}