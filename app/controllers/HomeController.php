<?php



class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{


		// $user = Sentry::getUser();

		$user = Item::all(); 

		// $item = new Item;
		// $item->title = 'Test title';
		// $item->save();

		return View::make('frontend.home')->with('info', $user);
		// return App::abort(404);

	}


	public function getRequest()
	{
		if(! Sentry::check())
		{
			return View::make('frontend/auth/signin');
		}

		$buyerID = Sentry::getId();

		$itemId = 49;

		$transaction = new Transaction;

		$transaction->item_id = $itemId;
		$transaction->buyer_id = $buyerID;
		$transaction->status = 1;

		if($transaction->save())
		{
			return "Success";
		}

		// $transaction = new Transaction(array('status' => 1, 'item_id'))
	}

}
