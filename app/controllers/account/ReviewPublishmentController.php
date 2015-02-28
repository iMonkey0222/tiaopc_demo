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

		foreach ($items as $item) {
			$itemID = $item->id;
			// One item has many priceArrays
			// One PriceArray variable is an array: id item_id price create_at updated_at
			$priceArrays = Item::find($itemID)->prices; 
			// get the first/newest priceArray
			$newest = $priceArrays->first();
			// get the price key value
			$newestPrice = $newest['price'];
			echo "<br>";
			echo $itemID.' is '.$newestPrice;

			array_add($item, 'price',"$newestPrice");
		}




		// Show the page
		return View::make('frontend/user/published-items',compact('$user', 'items'));
	}


	public function postIndex(){


	}
}