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

	/**
	 * search function
	 * @return search outcome page item-view-list
	 */
	public function searchItem(){

		$keyword = Input::get('query');

		$searchTerm = explode(' ', $keyword);

		foreach( $searchTerm as $term)
		{
			// This is the magic
			$items = Item::where('title', 'LIKE', '%'.$term.'%')->orderBy('created_at', 'DESC')->paginate(12);
		}

		foreach ($items as $item) 
		{
			// Add the main picture to the item array
			$itemPicture = Item::find($item->id)->pictures()->where('status','=','1')->first();
			$pictureName = $itemPicture['picture_name'];
			array_add($item, "picture_name", $pictureName);

			// Add the newest price to the item array
			$priceArray = Item::find($item->id)->prices->first(); 
			$newestPrice = $priceArray['price'];
			array_add($item, 'price',$newestPrice);



			// Add the parent_category_id to the item array;
			$category = Item::find($item->id)->category()->first(); 
			while($category->parent_id != NULL)
			{
				// Get the current category collection
				$category = Category::find($category->parent_id);				
			}

			array_add($item, 'parent_category_id', $category->id);

		}

		$trigger = TRUE; // chile category

		$parentCategory = Category::where('parent_id','=', NULL)->get(); 


		return View::make('frontend.item.view-item-list', compact('items', 'parentCategory','trigger'));
		// return View::make('frontend.test0', compact('items'));

	}


	public function getAboutUs()
	{
		return View::make('frontend.about-us');
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
