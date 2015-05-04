<?php


class Item extends Eloquent {
	protected $fillable = array('seller_id', 'id');
	 protected $table = 'items';

	/**
	 * [pictures description]
	 * @return [type] [description]
	 */
	public function pictures()
	{
		return $this->hasMany('Picture')
					->orderBy('created_at','DESC'); 

	}


	public function prices()
	{
		return $this->hasMany('Price')
					->orderBy('created_at','DESC'); 
	}

	public function pricesAsc()
	{
		return $this->hasMany('Price')
					->orderBy('created_at','ASC'); 		
	}



	public function transactions()
	{
		return $this->hasMany('Transaction', 'item_id');
	}

	public function getUser()
	{
		return $this->belongsTo('User', 'seller_id');
	}

	public function category()
	{
		return $this->belongsTo('Category', 'category_id', 'id');
	}


	public function scopeNormal($query)
	{
		return $query->where('status', '=', 0);
	}





}