<?php namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;
class ChangePasswordController extends AuthorizedController {
	/**
	 * User change password page.
	 * @return View
	 */
	public function getIndex(){
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('frontend.user.change-password')->with('user');
	}

	public function postIndex(){
		// Declare the rules for the form validation
		$rules = array(
			'old_password'		=> 'required|between:3,32',
			'password'			=> 'required|between:3,32',
			'password_confirm'	=> 'required|same:password',
			);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(),$rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails()) {
			# code...
			// somrthing gots wrong
			return Redirect::back()->withInput()->withErrors($validator);
			//echo "fail";
		}

		// Grab the user
		$user = Sentry::getUser();

		// Check the user current password
		if (! $user->checkPassword(Input::get('old_password'))) {
			// set the error page
			$this->messageBag->add('old_password','You entered the incorrect password.');

			// return to the changepassword page
			return Redirect::route('change-password')->withErrors($this->messageBag);
		}

		// Update the user password
		$user->password = Input::get('password');
		$user->save();

		// Redirect to the change-password page
		return Redirect::route('signin')->with('success', 'Password successfully updated!');
	}

}