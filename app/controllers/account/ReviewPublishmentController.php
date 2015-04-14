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
use Request;
use Response;
use Pagination;
use Config;
use Transaction;
use Lang;
use Mail;


class ReviewPublishmentController extends AuthorizedController {

	public function getPublishedItems()
	{
		// Get the user information
		$user = Sentry::getUser();
		$userID = $user->id;


		// Get all items  
		$items = Item::where('seller_id','=',$userID)->paginate(10);

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
 * [deleteItem description]
 * @param  [type] $itemID [description]
 * @return [type]         [description]
 */
	public function deleteItem(){


		if (Request::ajax()) {
			// Check if user or visitor
			if(! Sentry::check())
			{
				// Return to sign in page
				return 1;
			}
			else{
				// Get the item ID
				$itemID = Input::get('itemID');

				$item = Item::find($itemID);

				$item->status = 1; // item status is inactive
				
				$item->save();

				return $itemID; // delete the row
			}
		}
	}





/**
 * [getRequestedItems description]
 * @return [type] [description]
 */
	public function getRequestedItems(){
		// Get the user information
		$user = Sentry::getUser();
		$userID = $user->id;

		$transactions = Transaction::where('buyer_id','=',$userID)->paginate(10);

		// $transactions = User::find($userID)->transactions;

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
		foreach ($pictures as $picture) {
			if ($picture->status == 1) {
				$mainPic = $picture;
				break;
			}
		// 	$picName = $picture['picture_name'];
		// 	array_add($item, 'picture', "$picName");
		}

		// call function selfDefinedArray() to custom item array
		$item = $this->selfDefinedItemArray($item);


		// Get the parent category
		$categoryName = Category::find($item->category_id)->name;
		$parentCategory = Category::find($item->category_id)->parent_id;
		$parentCategoryName = Category::find($parentCategory)->name;

		array_add($item, 'category_name', $categoryName);
		array_add($item, 'parent_category_name', $parentCategoryName);


		// category1 is the last lategory, category2 is the previous cate, category3 is the ifrst cate
		$categories = Category::where('parent_id', "=", NULL)->get();

		// Get the condition array
		$condition = Config::get('condition');


		// Show the page
		return View::make('frontend/item/edit-item', compact('item', 'categories','pictures','mainPic','condition'));
	}





/**
 * [postUpload description]
 * @return [type] [description]
 */
    public function postUpload() {
    	// if(Request::ajax()){
    		$mainPicture = Input::file('mainPicture');
	        // $input = array('mainPicture' => $file);
	        $rules = array(
	            'mainPicture' => 'image',
	        );
	        $validator = Validator::make(array('mainPicture'=>$mainPicture), $rules);


	        if ( $validator->fails() )
	        {
	            return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
	 
	        }
	        else {
	            // $destinationPath = public_path().'/assets/img';
	            // $filename = $file->getClientOriginalName();
	            // $fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
	            // Input::file('image')->move($destinationPath, $filename);

	            $destinationPath = public_path().'/assets/img/';
				$extension = $mainPicture->getClientOriginalExtension(); // getting image extension

				$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
				$uploadSuccess = $mainPicture->move($destinationPath, $fileName);

				$mainPicture = new Picture;
				$mainPicture->picture_name = $fileName;
				$mainPicture->status = 1;

				$mainPicture->save();

	            return Response::json(['success' => true, 'file' => $destinationPath.$fileName]);
	        }
 
    }

   //  public function imageUpload() {
   //      $mainPicture = Input::file('mainPicture');
        
   //      $rules = array(
   //          'mainPicture' => 'image',
   //      );
   //      $validator = Validator::make(array('mainPicture'=>$mainPicture), $rules);
        


   //      if ( $validator->fails() )
   //      {
   //          return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
 
   //      }
   //      else {
	  //       $destinationPath = public_path().'/assets/img'; // destination path
			// $extension = $mainPicture->getClientOriginalExtension(); // getting image extension
			// $fileName = date("Ymdhis") . str_random(3) . "." . $extension; // set sile name
			// $uploadSuccess = $mainPicture->move($destinationPath, $fileName);
			// return Response::json(['success' => true, 'file' => asset($destinationPath.$fileName)]);
   //      }
   //  }

	/**
	 * Post single item edit form Without Picture upload!!!!!!
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

		// Declare validator rules
		$rules = array(
			'title' => 'min:3',
			'price' => 'numeric',
			'category' => 'required', // if not set this, will remind error
			'condition' => 'numeric',
			'description' => 'min:10',
			// 'pictures' => 'array|between:0,10', // Limit the file upload to 10
			);

		// Create a validator with all input
		$validator = Validator::make(Input::all(), $rules);

		// If validator fails, we will exit the operation now
		if ($validator -> fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}


		// * Update - item with validated input
		$item->title = Input::get('title');
		$item->category_id = Input::get('category');
		$item->product_condition = Input::get('condition');
		$item->description = Input::get('description');

		// * Save item to database
		if($item->save())
		{	
			$priceArray = new Price(['price' => e(Input::get('price'))]);

			if($item->prices()->save($priceArray))
			{
				// Save success, return to newly published item
				return Redirect::to("/item/$itemID")->with('success', Lang::get('admin/blogs/message.update.success'));

			}	
			// If error exists, return to publish page
			Return Redirect::to('/revise-item/$itemID')->with('error', Lang::get('admin/blogs/message.update.error'));
		}
	}

	/**
	 * Post single item edit form
	 * @param int $itemId item id
	 * @return view published single item page
	 */
	
	// public function PostSingleItemEditForm()
	// {
	// 	// Check if user or visitor
	// 	if(! Sentry::check())
	// 	{
	// 		// Return to sign in page
	// 		return View::make('frontend/auth/signin');
	// 	}
	// 	// Get all the input including images
	// 	$input = Input::all();

	// 	$itemID = Input::get('itemID'); // Get item id from hidden input

	// 	$item = Item::find($itemID);

	// 	// * 1. Get the original main picture
	// 	// $originMainPic = Picture::where(function($query){
	// 	// 	$query	->where('item_id','=',$itemID)
	// 	// 			->where('status','=','1');

	// 	// })->first();


	// 	// * 2. Get the orgin pics array
	// 	$originPics = Item::find($itemID)->pictures; 
	// 	foreach($originPics as $originPic){
	// 		if($originPic->status == 1){
	// 			$originMainPic = $originPic;
	// 			break;
	// 		}
	// 	}

	// 	// The number of pictures that user can upload
	// 	$extraPicsCount = 10-count($originPics); 

	// 	// Declare validator rules
	// 	$rules = array(
	// 		'title' => 'required|min:3',
	// 		'price' => 'required|numeric',
	// 		'category' => 'required',
	// 		'condition' => 'required|numeric',
	// 		'description' => 'required|min:10',
	// 		'pictures' => 'array|between:0,10', // Limit the file upload to 10
	// 		);


	// 	// Create a validator with all input
	// 	// Check all input format now
	// 	$validator = Validator::make(Input::all(), $rules);

	// 	// If validator fails, we will exit the operation now
	// 	if ($validator -> fails())
	// 	{
	// 		return Redirect::back()->withInput()->withErrors($validator);
	// 	}


	// 	// * Get the input of pictures
	// 	$mainPicture = Input::file('mainPicture');	// main pic user upload
	// 	$pictures = Input::file('pictures'); 		// newly pics user uploaded 


	// 	// * 1. Validate the main picture
	// 	$rules = array('mainPicture' => 'image'); // Declare main picture validator rules
	// 	$mainPicValidator = Validator::make(array('mainPicture' => $mainPicture),$rules);

	// 	if ($mainPicValidator -> fails()) {
	// 		return Redirect::back()->withInput()->withErrors($mainPicValidator);
	// 	}


	// 	// * 2. Validate the following pictures
	// 	// 
	// 	// Validate each picture if there any pictures not formatted, then fails
	// 	foreach ($pictures as $picture)
	// 	{
	// 		$rules = array('picture' => 'image'); // Declare pictures validator rules
	// 		$picValidator = Validator::make(array('picture' => $picture), $rules);

	// 		if($picValidator -> fails())
	// 		{				
	// 			return Redirect::back()->withInput()->withErrors($picValidator);
	// 		}
	// 	}


	// 	// * Update - item with validated input
	// 	$item->title = Input::get('title');
	// 	$item->category_id = Input::get('category');
	// 	$item->product_condition = Input::get('condition');
	// 	$item->description = Input::get('description');

	// 	// * Save item to database
	// 	if($item->save())
	// 	{	
	// 		// * 1. Checkout Main pic
	// 		$destinationPath = public_path().'/assets/img'; // destination path
	// 		$extension = $mainPicture->getClientOriginalExtension(); // getting image extension
	// 		$fileName = date("Ymdhis") . str_random(3) . "." . $extension; // set sile name
	// 		$uploadSuccess = $mainPicture->move($destinationPath, $fileName);

	// 		// * Update the original main picture status to 0
	// 		$originMainPic->status = 0;
	// 		$item->pictures()->save($originMainPic);

	// 		// * Create new Main picture
	// 		$mainPicture = new Picture;
	// 		$mainPicture->picture_name = $fileName;
	// 		$mainPicture->status = 1;



	// 		// * 1. Save main picture to item
	// 		if($item->pictures()->save($mainPicture))
	// 		{			
	// 			$uploadPicture = array(); // create an emapty array for picture upload

	// 			// * 2. Repeat checkout each following pictures 
	// 			foreach( $pictures as $picture )
	// 			{
	// 				$destinationPath = public_path().'/assets/img';
	// 				$extension = $picture->getClientOriginalExtension(); // getting image extension	
	// 				$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
	// 				$uploadSuccess = $picture->move($destinationPath, $fileName);

	// 				// push newly created Picture array with names to $uploadPicture array
	// 				array_push($uploadPicture, new Picture(array('picture_name' => $fileName)));
	// 			}

	// 			$priceArray = new Price(['price' => e(Input::get('price'))]);

	// 				if(($item->pictures()->saveMany($uploadPicture)) && ($item->prices()->save($priceArray)))
	// 			{
	// 				// Save success, return to newly published item
	// 				// return Redirect::to("/item/$itemID")->with('success', Lang::get('admin/blogs/message.create.success'));
	// 				return Redirect::action('ItemController@itemPictureProcess', array('id' => $itemID));
	// 			}				

	// 			// If error exists, return to publish page
	// 			Return Redirect::to('/revise-item/$itemID')->with('error', Lang::get('admin/blogs/message.create.error'));

	// 		}

	// 	}

	// }


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

/**
 * Check Item All Requests
 * @param  [type] $itemID [description]
 * @return wait accept page
 */
	public function getRequest($itemID){
		
		$user = Sentry::getUser();
		// $itemID = Input::get('itemID');
		$item = Item::find($itemID);

		$transactions = Transaction::where('item_id', '=', $itemID)->get();
		foreach ($transactions as $transaction) 
		{
			$buyer = User::find($transaction->buyer_id);
			$buyerNickname = $buyer->nickname;
			$transaction = array_add($transaction, 'buyerNickname', $buyerNickname);

		}
		// echo "<br><br> transactions<br>";
		// var_dump($transactions);
		// echo "<br><br>";
		$item = array_add($item,'transactions', $transactions);

	// 	$html = View::make('frontend/user/display-request',compact('$user', 'item'));
	
	// 	// return $html->renderSections()['account-content'];
		return View::make('frontend/user/display-request',compact('$user', 'item'));
	}


/**
 * Ajax of accept request button
 * @return [type] [description]
 */
	public function processAccept(){
		if (Request::ajax()) {
			// Check if user or visitor
			if(! Sentry::check())
			{
				// Return to sign in page
				return 1;
			}
			else{
				// Get the item ID and buyer ID
				$itemID = Input::get('itemID');
				$buyerID = Input::get('buyerID');
				$buyer = User::find($buyerID);	

				$item = Item::find($itemID);

				if ($item->order_status == 2) {
					return 4; //item was sold
				}
				else if($item->order_status == 1){
					// item is not sold
					
					// !!!-- Attention of scope query
					$transaction = Transaction::itemID($itemID)->buyerID($buyerID)->first();
					// Get the id of tran, only find() can change its value
					$transaction = Transaction::find($transaction->id);	

					$transaction->status = 2; // change to approved	
	

					if ($transaction->save()) {
						$data = array(
							'itemID' => $itemID,	

							'user' => $buyer,
						);	

						Mail::send('emails.notify-approved', $data, function($message) use ($buyer)
						{
							$message->to($buyer->email, $buyer->first_name .' '. $buyer->last_name);
							$message->subject('Request Approved Notification | Tiaopc');
						});
						return 2;
					}
						

					//return $itemID;
					// return $transaction['id']; 
					return 3;

				}
			}
		}
	}
/**
 * Make a Deal
 * @return [type] [description]
 */
	public function makeDeal(){
		if (Request::ajax()) {
			// Check if user or visitor
			if(! Sentry::check())
			{
				// Return to sign in page
				return 1;
			}
			else{
				$itemID = Input::get('itemID');
				$buyerID = Input::get('buyerID');

				$item = Item::find($itemID);

				// If item has been sold
				if ($item->order_status == 2) {
					return 4;	 // return sold info
				}else{
					// if item is not sold
					$transaction = Transaction::itemID($itemID)->buyerID($buyerID)->first();
					$transaction = Transaction::find($transaction->id);	

					$transaction ->status = 3; // change status to deal	
	
					$item->order_status = 2;	// update item status to sold	


					// if update transaction and item status
					if ($transaction->save() && $item->save()) {
						// return to update related button view
						return 2;	
					}else{
						// deal can not made 
						return 3;
					}

				}
			}
		}

	}

}