<?php 
namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;
use Item;
use User;
use Price;
use Picture;
use Post;

class ReviewPublishmentController extends AuthorizedController {

	public function getIndex()
	{
// pass the user id as paramater!!!!

		// Get the user information
		$user = Sentry::getUser();
		$userID = $user->id;
		$userEmail = $user->email;

		// // Get all items  
		$items = User::find(3)->getItems;

		if(is_null($items))
		{
			// If we ended up in here, it means that a page or a blog post
			// don't exist. So, this means that it is time for 404 error page.
			// return App::abort(404);
			echo "You haven't published item. \n Publish item now !!";
		}

		foreach ($items as $item) {
			$itemID = $item->id;
			// One item has many priceArrays
			// One PriceArray variable is an array: id item_id price create_at updated_at
			$priceArrays = Item::find($itemID)->prices; 
			// get the first/newest priceArray
			$newest = $priceArrays->first();
			// get the price key value
			$newestPrice = $newest['price'];
			// echo "<br>";
			// echo $itemID.' is '.$newestPrice;

			array_add($item, 'price',"$newestPrice");

			$pictures = Item::find($itemID)->pictures;
			array_add($item, 'pictures', "$pictures");

			// echo "$item";

		}




		// Show the page
		return View::make('frontend/user/published-items',compact('$user', 'items'));
	}


	public function postIndex(){


	}
}