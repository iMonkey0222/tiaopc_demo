<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




/**
 * Admin management routes
 */
Route::group(array('prefix' => 'admin'), function()
{
	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});


/**
 * Authentication and authorization routes
 */

Route::group(array('prefix' => 'auth'), function()
{
	// Login 
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	// Signup page
	Route::get('signup-selection', array('as' => 'signup-selection', 'uses' => 'AuthController@getSignupSelection'));


	// Quick-Register
	Route::get('quick-signup', array('as' => 'quick-signup', 'uses' => 'AuthController@getQuickSignup'));
	Route::post('quick-signup', 'AuthController@postQuickSignup');

	// Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	// Account activaiton
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	// Forgot password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	// Forgot password confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');


	// Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));



});



/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::group(array('prefix' => 'account'), function()
{
	// Account dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'HomeController@showWelcome'));
	
	// Profile 
	Route::get('profile',array('as'=>'profile', 'uses'=>'Controllers\Account\ProfileController@getIndex'));
	// Route::post('profile', 'HomeController@showWelcome');
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');


	// Change username
	// Change password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	// Change email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

	// View published products
	Route::get('published-items', array('as'=> 'published-items', 'uses' => 'Controllers\Account\ReviewPublishmentController@getPublishedItems')); 
	Route::post('published-items', 'Controllers\Account\ReviewPublishmentController@postIndex');

	// View requested products
	Route::get('requested-items', array('as'=> 'requested-items', 'uses' => 'Controllers\Account\ReviewPublishmentController@getRequestedItems')); 
	Route::post('requested-items', 'Controllers\Account\ReviewPublishmentController@postIndex');

	// Edit published item
	// Route::get('{itemID}', array('as' => 'editSingleItem', 'uses' => 'ItemController@getSingleItemEditForm'))->where('id', '[0-9]+');
	Route::get('revise-item/{itemID}', array('as' => 'reviseSingleItem', 'uses' => 'Controllers\Account\ReviewPublishmentController@getSingleItemEditForm'))->where('id', '[0-9]+');

	Route::post('revise-item', array('as' => 'postRevise', 'uses' =>'Controllers\Account\ReviewPublishmentController@PostSingleItemEditForm'));

	Route::get('revise-delete/{itemID}', array('as' => 'deleteItem','uses' => 'Controllers\Account\ReviewPublishmentController@deleteItem'))->where('id', '[0-9]+');

	Route::post('upload/image', array('as' => 'imageUpload', 'uses' => 'Controllers\Account\ReviewPublishmentController@postUpload'));

	
	// Display  all requests of item
	Route::get('show-request/{itemID}', array('as' => 'showRequest', 'uses' => 'Controllers\Account\ReviewPublishmentController@getRequest'))->where('id', '[0-9]+');
	// Post accept of request
	// Route::post('accept-request', array('as' => 'postAccept', 'uses' =>'Controllers\Account\ReviewPublishmentController@PostAcceptOfItem'));
	Route::get('accept-request', array('as' => 'acceptRequest', 'uses' => 'Controllers\Account\ReviewPublishmentController@processAccept'));


	Route::get('make-deal', array('as' => 'makeDeal', 'uses' => 'Controllers\Account\ReviewPublishmentController@makeDeal'));



});


/*
|--------------------------------------------------------------------------
| Item Routes
|--------------------------------------------------------------------------
|
|
|
*/
Route::group(array('prefix' => 'item'), function()
{
	// Show all items
	Route::get('all', array('as' => 'item', 'uses' => 'ItemController@getAllItems')); 
	// Show all items with specific parent category
	Route::get('all/{parentCategoryId}', array('as' => 'item/category', 'uses' => 'ItemController@getAllItemsWithCategory'))->where('parentCategoryId', '[0-9]+');

	// Show single item, parameter matching with regular expression
	Route::get('id{itemID}', array('as' => 'singleItem', 'uses' => 'ItemController@getSingleItem'))->where('itemID', '[0-9]+');


	Route::get('request', array('as' => 'request', 'uses' => 'ItemController@itemRequestProcess'));


	// Route::get('all/{category_id}', array('as' => 'item/category', 'uses' => 'ItemController@getAllItemsByCategory'))->where('category_id', '[0-9]+');
	Route::get('{location_name}/{category_id}/{sort_id}', array('as' => 'item/list', 'uses' => 'ItemController@getAllItemsByLocation'))->where(array('location_name' => '(suzhou|liverpool)', 'category_id' => '[0-9]+', 'sort_id' => '[0-9]+'));
	// Route::get('{location_name}', array('as' => 'item/suzhou', 'uses' => 'ItemController@getAllItemsByLocation'))->where('location_name', '(liverpool|suzhou)');



});



// Show a single item publish page and Post a single item form
Route::get('publish', array('as' => 'publish/item', 'uses' => 'ItemController@getSingleItemForm')); 
Route::post('publish', 'ItemController@PostSingleItemForm'); 






Route::get('publish/process/{id}', array('as' => 'publish/process', 'uses' => 'ItemController@itemPictureProcess'));




/**
 * Search Function
 */
Route::get('search', array('as' => 'search', 'uses' => 'HomeController@searchItem'));






/**
 * Home Page Temp
 */
// Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('/', array('as' => 'home', function(){
	return View::make('frontend.home');
}));

Route::get('homepage', function(){

	return View::make('frontend.home');
});

Route::get('request',array('as'=>'tempRuquest', 'uses' => 'HomeController@getRequest'));



/**
 * How to use
 */
Route::get('how-to-use', function(){

	return View::make('frontend.how-to-use');
});
/**
 * About Us & Contact Us
 */

Route::post('contact-us', array('as' => 'contact-us', 'uses' => 'HomeController@getContact'));
Route::get('about-us', array('as' => 'about-us', 'uses' => 'HomeController@getAboutUs'));



/**
 * Term and Policy
 */
Route::get('policy', function(){
	return View::make('frontend.policy');
});

/**
 * Test Page 
 */
Route::get('test0', array('as' => 'test', function(){
	return View::make('frontend.test0');
}));

Route::get('test1', array('as' => 'test', function(){
	return View::make('frontend.test1');
}));


/**
 * Ajax request route
 * 
 */

// Item page ajax
// Route::get('item/all', function(){

// 	if(isset(Input::get('page'))) {

// 		$items = Item::paginate(12);
		
// 		return View::make('frontend/item/view-item-list')->with('items', $items)->render();
// 	}
// });

// Price array chart
Route::get('get-price', array('as'=>'getPrice', function(){

	// if(Request::ajax())
	// {
		$itemId = Input::get('item_id');

		$priceArray = Item::find($itemId)->pricesAsc()->get();

		return Response::json($priceArray);
	// }
}));







// Category request
Route::get('publish-category', array('as' => 'getCategory', function()
{
	if(Input::get('category1_id'))
	{

		$category1_id = Input::get('category1_id');

		$subCategory = Category::where('parent_id', '=', $category1_id)->get();

		return Response::json($subCategory);

	}

	if(Input::get('category2_id'))
	{
		$category2_id = Input::get('category2_id');

		$subCategory = Category::where('parent_id', '=', $category2_id)->get();

		return Response::json($subCategory);
	}

}));

// Picture upload ajax





