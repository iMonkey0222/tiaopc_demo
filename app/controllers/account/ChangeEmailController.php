<?php namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;
class ChangeEmailController extends AuthorizedController {

	/**
	 * Display a listing of the resource.
	 * GET /account/changeemail
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('frontend/user/change-email')->with('user');
	}
	/**
	 * Users change email form processing page.
	 * @return Redirect
	 */
	public function postIndex(){
		$rules = array(
			'current_password'		=>'required|between:3,32',
			'email'			=>'required|email|unique:users,email,'.Sentry::getUser()->email2.'email',
			'email_confirm'	=>'required|same:email',
			);
		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = Sentry::getUser();

		if (! $user->checkPassword(Input::get('current_password'))) {

			// Set the error message
			$this->messageBag->add('current_password', 'Your current password is incorrect');

			// Redirect to the change email page
			return Redirect::route('change-email')->withErrors($this->messageBag);
		}

		// Update the user email
		$user->email = Input::get('email'); // modified! 3.12: $user->email2 to $user->email

		if($user->save()){
			// Redirect to the settings page
			return Redirect::route('change-email')->with('success', 'Email successfully updated');

		}
		return Redirect::to('/')->with('error',Lang::get('admin/users/message.update'));

	}


}