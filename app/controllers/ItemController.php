<?php

class ItemController extends BaseController {

	/**
	 * Get all items with paginate
	 * @return view items list view
	 */
	public function getAllItems()
	{

		// Get the all the parent category
		$parentCategory = Category::where('parent_id','=', NULL)->get(); 
	
		// Get all items with paginate 
		$items = Item::orderBy('created_at', 'DESC')->normal()->paginate(12);
		$trigger = TRUE;

		foreach($items as $item)
		{
			// Add the newest price to the item array
			$priceArray = Item::find($item->id)->prices->first(); 
			$newestPrice = $priceArray['price'];
			array_add($item, 'price',$newestPrice);

			// Add the main picture to the item array;
			$itemPicture = Item::find($item->id)->pictures()->where('status','=','1')->first();
			$pictureName = $itemPicture['picture_name'];
			array_add($item, "picture_name", $pictureName);



			// Add the parent_category_id to the item array;
			$category = Item::find($item->id)->category()->first(); 
			while($category->parent_id != NULL)
			{
				// Get the current category collection
				$category = Category::find($category->parent_id);				
			}

			array_add($item, 'parent_category_id', $category->id);
		}


		// Check the if ajax request
		if(Request::ajax()) {
			return Response::json(View::make('ajax/item-ajax', compact('items', 'parentCategory', 'trigger'))->render());
		}






		return View::make('frontend/item/view-item-list', compact('items', 'parentCategory', 'trigger'));	
	}

	/**
	 * Get all item with the specific parent category
	 * @param  int $id parent category id 
	 * @return view item list page 
	 */
	public function getAllItemsWithCategory($id)
	{
		$trigger = FALSE;

		$parentCategory = Category::where('parent_id','=',$id)->get(); 

		$categoryArray = Category::where('parent_id','=',$id)->lists('id'); 


		// get all item that contains child category id
		// $items = Item::whereIn('category_id',$categoryArray)->orderBy('created_at', 'DESC')->where('status', '=', '0')->orWhereNull('status')->paginate(12); 
		// $items = Item::whereIn('category_id',$categoryArray)->paginate(12); 
		// $items = Item::orderBy('created_at', 'DESC')->where('status', '=', '0')->orWhereNull('status');
		// $items = $items->whereIn('category_id', $categoryArray)->paginate(12);

		$items = Item::whereIn('category_id', $categoryArray)->normal()->orderBy('created_at', 'DESC')->paginate(12);

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

		}


		return View::make('frontend/item/view-item-list', compact('parentCategory','items', 'trigger'));	



	}


	public function getAllitemsByLocation($location_name, $categoryId, $sortId)
	{

		$parentCategory = Category::all();


		if($location_name == 'suzhou')
		{
			$location_id = 1;
		}
		if($location_name == 'liverpool')
		{
			$location_id = 0;
		}

		$sortKeyArray = ['created_at','created_at','price.price','price.price'];
		$sortArray = ['DESC','ASC','DESC','ASC'];



		if($categoryId == 0)
		{
			if($sortId == 0 || $sortId == 1)
			{			
				$items = Item::where('location', '=', $location_id)->orderBy($sortKeyArray[$sortId], $sortArray[$sortId])->normal()->paginate(12);				
			}
			if($sortId == 2 || $sortId == 3)
			{
				$items = Item::where('location', '=', $location_id)->normal()->leftJoin('price', 'items.id', '=', 'price.item_id')->orderBy($sortKeyArray[$sortId], $sortArray[$sortId])->paginate(12);				
			}
		}
		if($categoryId != 0)
		{
			if($sortId == 0 || $sortId == 1)
			{
				$items = Category::find($categoryId)->getChildItem()->where('location', '=', $location_id)->orderBy($sortKeyArray[$sortId], $sortArray[$sortId])->normal()->paginate(12);				
			}	

			if($sortId == 2 || $sortId == 3)
			{
				$items = Category::find($categoryId)->getChildItem()->where('location', '=', $location_id)->normal()->leftJoin('price', 'items.id', '=', 'price.item_id')->orderBy($sortKeyArray[$sortId], $sortArray[$sortId])->paginate(12);

			}
		}


		foreach ($items as $item)
		{

			if($item->item_id)
			{
				$item->id = $item->item_id;
			}


			// Add the main picture to the item array
			$itemPicture = Item::find($item->id)->pictures()->where('status','=','1')->first();
			$pictureName = $itemPicture['picture_name'];
			array_add($item, "picture_name", $pictureName);

			// Add the newest price to the item array
			$priceArray = Item::find($item->id)->prices->first(); 
			$newestPrice = $priceArray['price'];
			array_add($item, 'price',$newestPrice);

		}


		// foreach ($items as $item)
		// {
		// 	$title = Item::find($item->item_id)->title;
		// 	$price = Item::find($item->item_id)->price;
		// 	echo "title".$item->title." ".$item->id." ".$title ;
		// 	echo "<br>";

		// 	echo $item->item_id." price".$price;
		// 	echo "<br>";
		// 	var_dump($item->toJson());
		// }




		return View::make('frontend/item/view-item-list', compact('parentCategory','items', 'categoryId', 'sortId','location_name'));	

	}








	/**
	 * Get a single item with given id
	 * @param  int $id the item id
	 * @return view single item view
	 */
	public function getSingleItem($id)
	{
		$item = Item::find($id);

		// Get the seller and seller id
		$seller = $item->getUser;
		$sellerId = $seller->id;

		$pictures = Item::find($id)->pictures;


		// Default is 0 
		$triggleCode = 0;


		if(is_null($item))
		{
			// If we ended up in here, it means that a page or a blog post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		// if($item->status == 1)
		// {
		// 	return App::abort(404);
		// }

		/**
		 * Check the visitor status
		 * 1 for normal visitor withou login
		 * 2 for seller itself, and buyer that have a successful request
		 * 3 for buyer that has not requested
		 * 4 for buyer that is requesting 
		 */
		
		// echo "string";
		if(!Sentry::check())
		{
			// Show request without seller info
			$triggleCode = 1;
		}
		else
		{
			$visitor = Sentry::getId();

			if($visitor == $sellerId )
			{
				// Seller view its own item
				// Show without request 
				$triggleCode = 2;
			}
			else
			{
				// Buyer visits someone's item
				if(User::find($visitor)->transactions()->where('item_id', '=', $item->id)->exists())
				{
					// Get the status code of request status
					// the return value is string
					$requestStatus = User::find($visitor)->transactions()->where('item_id', '=', $item->id)->first()->status;

					if($requestStatus == "1")
					{
						// Requested but not approved
						$triggleCode = 4;
					}

					if($requestStatus == "2")
					{
						// Requested and approved
						$triggleCode = 2;
					}
				}
				else
				{
					// Not request
					$triggleCode = 3;
				}
			}
		}
		


		//Add picture to array
		$pictures = Item::find($id)->pictures;

		// Add the newest price to the item array
		$priceArray = Item::find($item->id)->prices->first(); 
		$newestPrice = $priceArray['price'];
		array_add($item, 'price',$newestPrice);
		
		// Add the category name to the item array
		$categoryName = Category::find($item->category_id)->name;
		array_add($item, 'category_name', $categoryName);

		// // Add the parent category name to the item array
		// $parentCategory = Category::find($item->category_id)->parent_id;
		// $parentCategoryName = Category::find($parentCategory)->name;
		// array_add($item, 'parent_category_name', $parentCategoryName);


		return View::make('frontend/item/view-single-item', compact('item','pictures', 'seller','triggleCode'));

	}

	/**
	 * Show item publish page
	 * @return view publish-item
	 */
	public function getSingleItemForm()
	{
		// Check if user or visitor
		if(! Sentry::check())
		{
			// Return to sign in page
			return View::make('frontend/auth/signin');
		}

		// Get the parent category
		$categories = Category::where('parent_id', "=", NULL)->get();
		// Get the condition array
		$condition = Config::get('condition');

		// Show the publish item page
		return View::make('frontend/item/publish-item', compact('categories','condition'));
	}



	/**
	 * Post a single item
	 * Process item publish form  
	 * @return  view redirect to the single item just published
	 */
	public function PostSingleItemForm()
	{

		// Check if user or visitor
		if(! Sentry::check())
		{
			// Return to sign in page
			return View::make('frontend/auth/signin');
		}
		// Get all the input including images
		$input = Input::all();



		// Declare validator rules
		$rules = array(
			'title' 		=> 'required|min:3|max:20',
			'price' 		=> 'required|numeric',
			'category' 		=> 'required',
			'condition' 	=> 'required|numeric',
			'location' 		=>'required',
			'description' 	=> 'required|min:10',
			'pictures' 		=> 'array|between:1,10', // Limit the file upload to 10
			);

		// Create a validator with input
		$validator = Validator::make(Input::all(), $rules);

		// If validator fails, we will exit the operation now
		if ($validator -> fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}


		// Validate each picture if there any pictures not formatted, then fails
		$mainPicture = Input::file('mainPicture'); // main picture
		$apicture = Input::file('picture');
		$pictures = Input::file('pictures'); // picture array

		$rules = array('mainPicture' => 'image');
		$picValidator = Validator::make(array('mainPicture' => $mainPicture), $rules);


		// * 1. Validate main picture
		if($picValidator -> fails())
		{
			return Redirect::back()->withInput()->withErrors($picValidator);
		}
		// * 2. Validate picture
		$rules = array('picture' => 'image');
		$picValidator = Validator::make(array('picture'=> $apicture), $rules);

		if ($picValidator -> fails()) {
			return Redirect::back()->withInput()->withErrors($picValidator);
		}
		// * 3. Validate picture
		foreach ($pictures as $picture)
		{
			$rules = array('picture' => 'image');
			$picValidator = Validator::make(array('picture' => $picture), $rules);

			if($picValidator -> fails())
			{
				return Redirect::back()->withInput()->withErrors($picValidator);
			}

		}


		// Create new item instance to be stored in the db
		$item = new Item;

		// Update item with validated input
		$item->title 		= e(Input::get('title'));
		$item->category_id 	= e(Input::get('category'));
		$item->product_condition = e(Input::get('condition'));
		$item->location   	= e(Input::get('location'));
		$item->description 	= e(Input::get('description'));
		$item->seller_id 	= Sentry::getId();
		$item->status 		= 0; // 0 for active





		if($item->save())
		{	
			// Get current item
			$itemId = Item::find($item->id);


			// * 1. Checkout main picture upload
			$destinationPath = public_path().'/assets/img';
			$extension = $mainPicture->getClientOriginalExtension(); // getting image extension
			$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
			$uploadSuccess = $mainPicture->move($destinationPath, $fileName);


			// Fail in this way. Just don't know why
			// $mainPicture = new Picture(array('picture_name' => $fileName, 'status' => 2));
			$mainPicture = new Picture;
			$mainPicture->picture_name = $fileName;
			$mainPicture->status = 1;


			// * 2. Checkout picture upload
			$destinationPath = public_path().'/assets/img';
			$extension = $apicture->getClientOriginalExtension(); // getting image extension
			$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
			$uploadSuccess = $apicture->move($destinationPath, $fileName);

			$apicture = new Picture;
			$apicture->picture_name = $fileName;
			$apicture->status = 0;

			// * 3. Checkout following pictures upload
			if($itemId->pictures()->save($mainPicture) && $itemId->pictures()->save($apicture))
			{
				// Check picture upload
				$uploadPicture = array();

				foreach( $pictures as $picture )
				{

					$destinationPath = public_path().'/assets/img';
					$extension = $picture->getClientOriginalExtension(); // getting image extension
					$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
					$uploadSuccess = $picture->move($destinationPath, $fileName);
					array_push($uploadPicture, new Picture(array('picture_name' => $fileName)));

				}

				$price = new Price(['price' => e(Input::get('price'))]);

				if(($itemId->pictures()->saveMany($uploadPicture)) && ($itemId->prices()->save($price)))
				{
					// Process the picture 
					// the route has already been set up
					return Redirect::action('ItemController@itemPictureProcess', array('id' => $itemId->id));

				}
			}


		}


		// If error exists, return to publish page
		Return Redirect::to('/item/publish')->with('error', Lang::get('admin/blogs/message.create.error'));


	}




	public function itemPictureProcess($id)
	{

		echo "Wait for a second. Processing the images upload... ";

		$itemPictures = Item::find($id)->pictures;

		foreach ($itemPictures as $picture) 
		{

			// Original path of picture
			$originalPath = public_path().'/assets/img';
			$pictureOriginalPath = $originalPath."/".$picture->picture_name;
			// New path of the picture
			$newPath = public_path().'/assets/new_img';
			$pictureNewPath = $newPath."/".$picture->picture_name;
			// Get the picture
			$img = Image::make($pictureOriginalPath);
			// Picture ratio
			$ratio = 4/3;

			// Check the current size of img is appropriate or not,
			// if ratio of current img is greater than 1.33, then crop
			if(intval($img->width()/$ratio > $img->height()))
			{
				// Fit the img to ratio of 4:3, based on the height
				$img->fit(intval($img->height() * $ratio),$img->height());
			} 
			else
			{
				// Fit the img to ratio of 4:3, based on the width
				$img->fit($img->width(), intval($img->width()/$ratio));
			}

			// Save, still need throw exception
			$img->save($pictureNewPath);
			
		}

		// Process and save the pictures successfully
		return Redirect::to("/item/id$id")->with('success', Lang::get('admin/blogs/message.create.success'));
	}





	public function itemRequestProcess ()
	{

		if(Request::ajax()){
			// Check if user or visitor
			if(! Sentry::check())
			{
				// Return to sign in page
				return 1;
			}

			// Get the buyer ID
			$userID = Sentry::getId();
			// Get the item ID
			$itemID = Input::get('itemID');

			// $user = Sentry::getUser();
			$user = User::find($userID);
			// $userAccountName = $user->nickname;
			//Check if User nickname is empty, request user to finish their profile first
			if (empty($user->nickname)) 
			{
				return 5;
			}

			// Check if the request already exist 
			if(User::find($userID)->transactions()->where('item_id', '=', $itemID)->exists())
			{
				return 2;
			}

			// Check if the seller itself
			$seller = Item::find($itemID)->getUser;
			$sellerId = $seller->id;

			if($sellerId == $userID)
			{
				return 4;
			}




			// Change order status
			$item = Item::find($itemID);

			$item->order_status = 1; //1 for request 2 for deal 
			

			// Creat new transcation
			$transaction = new Transaction;
			$transaction->item_id = $itemID;
			$transaction->buyer_id = $userID;
			$transaction->status = 1; // 1 for Requested

			if($transaction->save() && $item->save())
			{

				$data = array(
					'itemID' => $itemID,	

					'user' => $seller,
				);	

				Mail::send('emails.notify-request', $data, function($message) use ($seller)
				{
					$message->to($seller->email, $seller->first_name .' '. $seller->last_name);
					$message->subject('Item Request Notification | Tiaopc');
				});
				return 3;

			}

		}

	}





}