<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function getAllUsers (){
			// TEST
	// $users = DB::table('users')->get();
	// foreach ($users as $user) {
	// 	var_dump($user->first_name);
	// }
	// 
			
	}


	public function getItems(){
		return $this->hasMany('Item', 'seller_id');
	}

	public function transactions()
	{
		return $this->hasMany('Transaction', 'buyer_id');
	}

}
