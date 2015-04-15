<?php
namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;
class ProfileController extends AuthorizedController {

	/**
	 * User profile page.
	 * @return View
	 */
	public function getIndex(){
		$user = Sentry::getUser();
		return View::make('frontend.user.profile')->withUser($user);
	}

	/**
	 * User profile form processing page.
	 * @return Redirect
	 */
	public function postIndex(){

		// Declare the rules for the form validation
		$rules = array(
			'nickname'		=> 'required|min:2|unique:users',
			'first_name'	=>'required|min:2',
			'last_name'		=>'required|min:2',
			'location' 		=>'required',
			'phone_number' 	=>'required|numeric|digits:11',
			);
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails()) {
			// Ooops.. something went wrong
			// Redirect back to the same page where the request comes from
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Update the user information
		$user->nickname		= Input::get('nickname');

		$user->first_name 	= Input::get('first_name');
		$user->last_name  	= Input::get('last_name');
		// $user->email2     = Input::get('login_email');
		$user->location   	= Input::get('location');
		$user->phone_no   	= Input::get('phone_number');
		$user->weixin		= Input::get('weixin');
		$user->qq 			= Input::get('qq');

		if ($user->save()) {
			// Redirect to the settings page
			// echo "OK";
			return Redirect::route('profile')->with('success','Profile updated successfully!');
		}
		
		return Redirect::to('/')->with('error',Lang::get('admin/users/message.update'));

		
	}

}