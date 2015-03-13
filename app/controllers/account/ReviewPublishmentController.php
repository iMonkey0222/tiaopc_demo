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
use Category;


class ReviewPublishmentController extends AuthorizedController {

	public function getPublishedItems()
	{
		// Get the user information
		$user = Sentry::getUser();
		$userID = $user->id;

		// Get all items  
		$items = User::find($userID)->getItems;

		if(is_null($items))
		{
			// If we ended up in here, it means that a page or a blog post
			// don't exist. So, this means that it is time for 404 error page.
			// return App::abort(404);
			echo "You haven't published item. \n Publish item now !!";
		}
		
		// For each item array, call function selfDefinedArray() to custom item array
		foreach ($items as $item) {
			$item = $this->selfDefinedItemArray($item); 
		}

		// Show the page
		return View::make('frontend/user/published-items',compact('$user', 'items'));
	}
/**
 * [getRequestedItems description]
 * @return [type] [description]
 */
	public function getRequestedItems(){
		// Get the user information
		$user = Sentry::getUser();
		$userID = $user->id;

		$transactions = User::find($userID)->transactions;
		// $records = array();

		if (is_null($transactions)) {
			echo "You haven't request any product.";
		}

		foreach ($transactions as $transaction) {
			$itemID = $transaction->item_id;
			$item = Item::find($itemID);
			$item = $this->selfDefinedItemArray($item); // add price and main picture to item

			$itemTitle = $item->title;
			$itemPrice = $item->price;
			$sellerID = $item->seller_id;
			$mainPicture = $item->picture;

			array_add($transaction,'seller_id',"$sellerID");
			array_add($transaction,'item_title',"$itemTitle");
			array_add($transaction,'item_price',"$itemPrice");
			array_add($transaction,'item_picture',"$mainPicture");
			
		}
		return View::make('frontend/user/requested-items',compact('$user','transactions'));

	}



	// /**
	//  * Get published single item page
	//  * @param  int $itemId 
	//  * @return view single item edit view
	//  */
	public function getSingleItemEditForm($itemID)
	{
		$item = Item::find($itemID);
		// Check if the item exists
		if (is_null($item))
		{
			// Redirect to the blogs management page
			return Redirect::to('admin/blogs')->with('error', Lang::get('admin/blogs/message.does_not_exist'));
		}


		// add picture to item array
		$pictures = Item::find($itemID)->pictures;
		// foreach ($pictures as $picture) {
		// 	$picName = $picture['picture_name'];
		// 	array_add($item, 'picture', "$picName");
		// }

		// call function selfDefinedArray() to custom item array
		$item = $this->selfDefinedItemArray($item);

		$categories = Category::get();


		// Show the page
		return View::make('frontend/item/edit-item', compact('item', 'categories','pictures'));
	}

/**
 * [deleteItem description]
 * @param  [type] $itemID [description]
 * @return [type]         [description]
 */
	public function deleteItem($itemID){
		// Check if user or visitor
		if(! Sentry::check())
		{
			// Return to sign in page
			return View::make('frontend/auth/signin');
		}
		$item = Item::find($itemID);
		echo "Item need to be deleted is "."$itemID";
		return View::make('frontend/item/edit-item');

	}


	/**
	 * Post single item edit form
	 * @param int $itemId item id
	 * @return view published single item page
	 */
	public function PostSingleItemEditForm()
	{
		// Check if user or visitor
		if(! Sentry::check())
		{
			// Return to sign in page
			return View::make('frontend/auth/signin');
		}
		// Get all the input including images
		$input = Input::all();

		$itemID = Input::get('itemID'); // Get item id from hidden input

		$item = Item::find($itemID);

		$originPics = Item::find($itemID)->pictures; // get the orgin pics array

		// $originPics = $item->pictures; 
		$extraPicsCount = 10-count($originPics); // the number of pictures that user can upload

		// Declare validator rules
		$rules = array(
			'title' => 'required|min:3',
			'price' => 'required|numeric',
			'category' => 'required',
			'condition' => 'required|numeric',
			'description' => 'required|min:10',
			'pictures' => 'array|between:1,10', // Limit the file upload to 10
			);


		// Create a validator with input
		$validator = Validator::make(Input::all(), $rules);

		// If validator fails, we will exit the operation now
		if ($validator -> fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}


		// Validate each picture if there any pictures not formatted, then fails
		$pictures = Input::file('pictures'); // newly pics user uploaded 

		foreach ($pictures as $picture)
		{
			$rules = array('picture' => 'image');
			$picValidator = Validator::make(array('picture' => $picture), $rules);

			if($picValidator -> fails())
			{
				return Redirect::back()->withInput()->withErrors($picValidator);
			}
		}


		// Update item with validated input
		$item->title = Input::get('title');
		$item->category_id = Input::get('category');
		$item->product_condition = Input::get('condition');
		$item->description = Input::get('description');

		// 		array_add($item, 'price',"$newestPrice");


		if($item->save())
		{	
				// Main pic
				// 
			if($item->pictures()->save($mainPicture))
			{
				// Check picture upload
				$uploadPicture = array();

			// $pictures is not null
				foreach( $pictures as $picture )
				{
					$destinationPath = public_path().'/assets/img';

					// if user upload extra pictures
					// if (!is_null($picture)) 
					// {
						$extension = $picture->getClientOriginalExtension(); // getting image extension

						$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
						$uploadSuccess = $picture->move($destinationPath, $fileName);


						array_push($uploadPicture, new Picture(array('picture_name' => $fileName)));
						# code...
					// }

					// Else if user did not upload extra pictures
					// Do thing
				}

				$priceArray = new Price(['price' => e(Input::get('price'))]);

					if(($item->pictures()->saveMany($uploadPicture)) && ($item->prices()->save($priceArray)))
				{
					// Save success, return to newly published item
					// return Redirect::to("/item/$itemID")->with('success', Lang::get('admin/blogs/message.create.success'));
					return Redirect::action('ItemController@itemPictureProcess', array('id' => $itemID));
				}				

				// If error exists, return to publish page
				Return Redirect::to('/revise-item/$itemID')->with('error', Lang::get('admin/blogs/message.create.error'));

			}

	}

}


/**
 * Customized ItemArray
 * @param  array $items 
 * @return array        new items array
 */
	public function selfDefinedItemArray($item){
			$itemID = $item->id;

			// One item has many priceArrays
			// One PriceArray variable is an array: id item_id price create_at updated_at
			$priceArrays = Item::find($itemID)->prices; 
			// get the first/newest priceArray
			$newest = $priceArrays->first();
			// get the price key value
			$newestPrice = $newest['price'];
			array_add($item, 'price',"$newestPrice");


			$pictures = Item::find($itemID)->pictures;
			foreach ($pictures as $picture) {
				if ($picture['status']=='1') {
					$picName = $picture['picture_name'];
					array_add($item, 'picture', "$picName");
					break;
				}
				
			}
			
		return $item;
	}

}