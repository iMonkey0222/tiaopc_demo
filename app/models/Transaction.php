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
	public function scopeItemID($query, $item_id){
		return $query->where('item_id','=',$item_id);

	}
	public function scopeBuyerID($query, $buyer_id){
		return $query->where('buyer_id','=',$buyer_id);

	}

}