<?php


class Picture extends Eloquent {
	protected $fillable = ['picture_name'];

    public function items()
    {
        return $this->belongsTo('Item');
    }

}