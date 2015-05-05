<?php

class AuthController extends BaseController {



	/**
	 * Account sign in 
	 * @return page if check ok, then show home page 
	 * else show sign in page
	 * 
	 */
	public function getSignin() 
	{

// Because user's friend want to sign in user thier own account, 
// so we do not need to check whether user is signed in
		// 
		// Check user sign in
		// if(Sentry::check())
		// {
		// 	$user = Sentry::getUser();
		// 	// return Redirect::route('account');
		// 	return View::make('frontend/user/profile',compact('$user'));
		// }

		// If not, show sign in page
		return View::make('frontend.auth.signin');
	}


	public function postSignin()
	{
		// Declare rules for validation
		$rules = array(
			'email' 	=> 'required|email',

			'password' 	=> 'required|between:3,32',
			);

		// Create a validator instance from our validation rules
		$validator = Validator::make(Input::all(),$rules);

		// If validator fails, exit
		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		
		try
		{

			$credentials = array(
    			'email'    => Input::get('email'),
    			'password' => Input::get('password'),
   		 		
			);
			// Try to log the user in
			Sentry::authenticate($credentials, Input::get('remember_me',0));

			// Sentry::authenticate(Input::only('email','password'), Input::get('remember_me',0));

			// Get the page we were before sign in
			// $redirect = Session::get('loginRedirect','account');



			// Unset the page we were before from the session
			Session::forget('loginRedirect');


// Modified By XY W ----3.9
// 
// After user signed in, then redirect to account/profile page
			$user = Sentry::getUser();
			// Redirect to the user page
			// Redirect::to('/')
			return Redirect::to('account/profile')->with('$user','success', Lang::get('auth/message.signin.success'));

		}

		// Catch each exception of user by email
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
		}
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_banned'));
		}

		//Return and redirect the fail message
		return Redirect::back()->withInput()->withErrors($this->messageBag);
	}
/**
 * [getSignupSelection description]
 * @return [type] [description]
 */
	public function getSignupSelection()
	{
		// Show the page
		return View::make('frontend.auth.signup-selection');
	}
/**
 * [getQuickSignup description]
 * @return [type] [description]
 */
	public function getQuickSignup()
	{
		// Show the page
		return View::make('frontend.auth.quick-signup');
	}
/**
 * [postSignup description]
 * @return [type] [description]
 */
	public function postQuickSignup()
	{
		// Define a validation rule called not_contains
		Validator::extend('not_contains', function($attribute, $value, $parameters){
			if (strpos($value, '@') !== FALSE) {
				return false; // find the @
			} 
			return true; // the validation passed
		})

		;
		// Declare the rules for the form validation
		$rules = array(
			'email2'            	=> 'required|unique:users|not_contains',
			'school_address'		=> 'required',
			'email'					=> 'required|email|unique:users',
			'password'         		=> 'required|between:3,32',
			'password_confirm' 		=> 'required|same:password',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		try
		{
			$school_address = (Input::get('school_address') == 'xjtlu')? Config::get('helper.mail_postfix_xjtlu') : Config::get('helper.mail_postfix_liv');

			// Register the user
			$user = Sentry::register(array(
				'email'      	=> Input::get('email'), 
				'email2'		=> Input::get('email2').$school_address,
				'password'   	=> Input::get('password'),
				'activated'		=> '0';
			));

			// Data to be used on the email view
			$data = array(
				'user'          => $user,
				'activationUrl' => URL::route('activate', $user->getActivationCode()),
			);

			// Send the activation code through email
			Mail::send('emails.register-activate', $data, function($m) use ($user)
			{
				$m->to($user->email2, $user->first_name . ' ' . $user->last_name);
				$m->subject('Welcome ' . $user->first_name);
			});

			// Redirect to the register page
			// Redirect::back() (back to last page)
			return Redirect::route('signin')->with('success', Lang::get('auth/message.signup.success'));
		}


		// Catch user exist exception 
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
		}

		// Ooops.. something went wrong
		return Redirect::back()->withInput()->withErrors($this->messageBag);
	}
	/**
	 * Account sign up
	 * @return page if user already sign in, then get in account page
	 * else show sign up page
	 */
	public function getSignup()
	{
		// Is the user logged in?
		
		// XYW!! Modified 3.9 ！！！！！！
		
		// if (Sentry::check())
		// {
		// 	return Redirect::to('/');
		// }

		// Show the page
		return View::make('frontend.auth.signup');
	}


	/**
	 * Account sign up form processing.
	 *
	 * @return Redirect
	 */
	public function postSignup()
	{
		// Define a validation rule called not_contains
		Validator::extend('not_contains', function($attribute, $value, $parameters){
			if (strpos($value, '@') !== FALSE) {
				return false; // find the @
			} 
			return true; // the validation passed
		})

		;
		// Declare the rules for the form validation
		$rules = array(
			'nickname'		   		=> 'required|min:2|unique:users',
			'first_name'       		=> 'required|min:2',
			'last_name'        		=> 'required|min:2',
			'email2'            	=> 'required|unique:users|not_contains',
			'email2_confirm'    	=> 'required|same:email2|not_contains',
			'school_address'		=> 'required',

			'email'					=> 'required|email|unique:users',
			'email_confirm'			=> 'required|same:email',

			'password'         		=> 'required|between:3,32',
			'password_confirm' 		=> 'required|same:password',
			'location' 				=> 'required',
			'phone_number'	   		=> 'required|numeric|digits:11',

		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}


		try
		{
			$school_address = (Input::get('school_address') == 'liv')? Config::get('helper.mail_postfix_liv') : Config::get('helper.mail_postfix_xjtlu');

			// Register the user
			$user = Sentry::register(array(
				'nickname'		=> Input::get('nickname'),
				'first_name' 	=> Input::get('first_name'),
				'last_name'  	=> Input::get('last_name'),
				'email'      	=> Input::get('email'), 
				'email2'		=> Input::get('email2').$school_address,
				'password'   	=> Input::get('password'),
				'location'		=> Input::get('location'),
				'phone_no'		=> Input::get('phone_number'),
				'weixin'		=> Input::get('weixin'),
				'qq'			=> Input::get('qq'),

			));

			// Data to be used on the email view
			$data = array(
				'user'          => $user,
				'activationUrl' => URL::route('activate', $user->getActivationCode()),
			);

			// Send the activation code through email
			Mail::send('emails.register-activate', $data, function($m) use ($user)
			{
				$m->to($user->email2, $user->first_name . ' ' . $user->last_name);
				$m->subject('Welcome ' . $user->first_name);
			});

			// Redirect to the register page
			// Redirect::back() (back to last page)
			return Redirect::route('signin')->with('success', Lang::get('auth/message.signup.success'));
		}


		// Catch user exist exception 
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			$this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
		}

		// Ooops.. something went wrong
		return Redirect::back()->withInput()->withErrors($this->messageBag);


	}


	/**
	 * User account activation page.
	 *
	 * @param  string  $actvationCode
	 * @return
	 */
	public function getActivate($activationCode = null)
	{
		// Is the user logged in?
		if (Sentry::check())
		{
			return Redirect::route('account');
		}

		try
		{
			// Get the user we are trying to activate
			$user = Sentry::getUserProvider()->findByActivationCode($activationCode);

			// Try to activate this user account
			if ($user->attemptActivation($activationCode))
			{
				// Redirect to the login page
				return Redirect::to('how-to-use')->with('success', Lang::get('auth/message.activate.success'));
			}

			// The activation failed.
			$error = Lang::get('auth/message.activate.error');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			$error = Lang::get('auth/message.activate.error');

			// Ooops.. something went wrong
			return Redirect::route('signin')->with('error', $error);
		}

		
	}


	/**
	 * Forgot password page.
	 *
	 * @return View
	 */
	public function getForgotPassword()
	{
		// Show the page
		return View::make('frontend.auth.forgot-password');
	}



	/**
	 * Forgot password form processing page.
	 *
	 * @return Redirect
	 */
	public function postForgotPassword()
	{
		// Declare the rules for the validator
		$rules = array(
			'email' => 'required|email',
		);

		// Create a new validator instance from our dynamic rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::route('forgot-password')->withInput()->withErrors($validator);
		}

		try
		{
			// Get the user password recovery code
			$user = Sentry::getUserProvider()->findByLogin(Input::get('email'));

			// Data to be used on the email view
			$data = array(
				'user'              => $user,
				'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
			);

			// Send the activation code through email
			Mail::send('emails.forgot-password', $data, function($m) use ($user)
			{
				$m->to($user->email, $user->first_name . ' ' . $user->last_name);
				$m->subject('Account Password Recovery');
			});
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			// Even though the email was not found, we will pretend
			// we have sent the password reset code through email,
			// this is a security measure against hackers.
		}

		//  Redirect to the forgot password
		return Redirect::route('forgot-password')->with('success', Lang::get('auth/message.forgot-password.success'));
	}


	/**
	 * Forgot Password Confirmation page.
	 *
	 * @param  string  $passwordResetCode
	 * @return View
	 */
	public function getForgotPasswordConfirm($passwordResetCode = null)
	{
		try
		{
			// Find the user using the password reset code
			$user = Sentry::getUserProvider()->findByResetPasswordCode($passwordResetCode);
		}
		catch(Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			// Redirect to the forgot password page
			return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
		}

		// Show the page
		return View::make('frontend.auth.forgot-password-confirm');
	}

	/**
	 * Forgot Password Confirmation form processing page.
	 *
	 * @param  string  $passwordResetCode
	 * @return Redirect
	 */
	public function postForgotPasswordConfirm($passwordResetCode = null)
	{
		// Declare the rules for the form validation
		$rules = array(
			'password'         => 'required',
			'password_confirm' => 'required|same:password'
		);

		// Create a new validator instance from our dynamic rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::route('forgot-password-confirm', $passwordResetCode)->withInput()->withErrors($validator);
		}

		try
		{
			// Find the user using the password reset code
			$user = Sentry::getUserProvider()->findByResetPasswordCode($passwordResetCode);

			// Attempt to reset the user password
			if ($user->attemptResetPassword($passwordResetCode, Input::get('password')))
			{
				// Password successfully reseted
				return Redirect::route('signin')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
			}
			else
			{
				// Ooops.. something went wrong
				return Redirect::route('signin')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
			}
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			// Redirect to the forgot password page
			return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
		}
	}


	/**
	 * Logout page.
	 *
	 * @return Redirect
	 */
	public function getLogout()
	{
		// Log the user out
		Sentry::logout();

		// Redirect to the users page
		return Redirect::route('home')->with('success', 'You have successfully logged out!');
	}

	

}