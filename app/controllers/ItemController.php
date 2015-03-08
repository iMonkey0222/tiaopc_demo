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
		$items = Item::orderBy('created_at', 'DESC')->paginate(12);

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
			$parentCategoryId = Item::find($item->id)->category()->first()->parent_id; 
			array_add($item, 'parent_category_id', $parentCategoryId);
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

		$categorySet = Category::where('parent_id','=',$id)->lists('id'); 

		// get all item that contains child category id
		$items = Item::whereIn('category_id',$categorySet)->orderBy('created_at', 'DESC')->paginate(12); 

		foreach ($items as $item)
		{

			// Add the main picture to the item array
			$itemPicture = Item::find($item->id)->pictures()->where('status','=','1')->first();
			$pictureName = $itemPicture['picture_name'];
			array_add($item, "picture_name", $pictureName);

			// Add the newest picure to the item array
			$priceArray = Item::find($item->id)->prices->first(); 
			$newestPrice = $priceArray['price'];
			array_add($item, 'price',$newestPrice);

		}


		return View::make('frontend/item/view-item-list', compact('parentCategory','items', 'trigger'));	



	}



	/**
	 * Get a single item with given id
	 * @param  int $id the item id
	 * @return view single item view
	 */
	public function getSingleItem($id)
	{
		$item = Item::find($id);

		$pictures = Item::find($id)->pictures;

		if(is_null($item))
		{
			// If we ended up in here, it means that a page or a blog post
			// don't exist. So, this means that it is time for 404 error page.
			return App::abort(404);
		}

		return View::make('frontend/item/view-single-item', compact('item','pictures'));

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

		// Get the category list
		$categories = Category::get();
		// Show the publish item page
		return View::make('frontend/item/publish-item', compact('categories'));
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
		$mainPicture = Input::file('mainPicture'); // main picture
		$pictures = Input::file('pictures'); // picture array

		$rules = array('mainPicture' => 'image');
		$picValidator = Validator::make(array('mainPicture' => $mainPicture), $rules);

		// Validate main picture
		if($picValidator -> fails())
		{
			return Redirect::back()->withInput()->withErrors($picValidator);
		}


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
		$item->title = e(Input::get('title'));
		$item->category_id = e(Input::get('category'));
		$item->product_condition = e(Input::get('condition'));
		$item->description = e(Input::get('description'));
		$item->seller_id = Sentry::getId();





		if($item->save())
		{	
			// Get current item
			$itemId = Item::find($item->id);


			// Checkout main picture upload
			$destinationPath = public_path().'/assets/img';
			$extension = $mainPicture->getClientOriginalExtension(); // getting image extension

			$fileName = date("Ymdhis") . str_random(3) . "." . $extension; 
			$uploadSuccess = $mainPicture->move($destinationPath, $fileName);


			// Fail in this way. Just don't know why
			// $mainPicture = new Picture(array('picture_name' => $fileName, 'status' => 2));
			$mainPicture = new Picture;
			$mainPicture->picture_name = $fileName;
			$mainPicture->status = 1;


			if($itemId->pictures()->save($mainPicture))
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

	/**
	 * Get published single item page
	 * @param  int $itemId 
	 * @return view single item edit view
	 */
	public function getSingleItemEditForm($itemId)
	{
		// Check if the item exists
		if (is_null($item = Item::find($postId)))
		{
			// Redirect to the blogs management page
			return Redirect::to('admin/blogs')->with('error', Lang::get('admin/blogs/message.does_not_exist'));
		}

		// Show the page
		return View::make('frontend/item/edit-item', compact('item'));
	}

	/**
	 * Post single item edit form
	 * @param int $itemId item id
	 * @return view published single item page
	 */
	public function PostSingleItemEditForm($itemId)
	{

	}



	public function itemPictureProcess($id)
	{

		echo "Wait for a second. Processing the images uplpad... ";

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
		return Redirect::to("/item/$id")->with('success', Lang::get('admin/blogs/message.create.success'));
	}









}