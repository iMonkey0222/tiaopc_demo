<?php 
namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;

class ReviewPublishmentController extends AuthorizedController {

	public function getIndex()
	{
		// Get the user information
		$user = Sentry::getUser();

		// Show the page
		return View::make('frontend/user/published-items')->with('user');
	}


	public function postIndex(){


	}
}