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



/**
 * Authentication and authorization routes
 */

Route::group(array('prefix' => 'auth'), function()
{
	// Login 
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

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
	Route::get('published-items', array('as'=> 'published-items', 'uses' => 'Controllers\Account\ReviewPublishmentController@getIndex')); 
	Route::post('published-items', 'Controllers\Account\ReviewPublishmentController@postIndex');


	// Edit published item
	Route::get('{itemID}', array('as' => 'editSingleItem', 'uses' => 'ItemController@getSingleItemEditForm'))->where('id', '[0-9]+');
	Route::post('{itemID}', 'ItemController@PostSingleItemEditForm')->where('id', '[0-9]+');

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
	Route::get('{itemID}', array('as' => 'singleItem', 'uses' => 'ItemController@getSingleItem'))->where('itemID', '[0-9]+');



});



// Show a single item publish page and Post a single item form
Route::get('publish', array('as' => 'publish/item', 'uses' => 'ItemController@getSingleItemForm')); 
Route::post('publish', 'ItemController@PostSingleItemForm'); 



/**
 * Home Page Temp
 */
// Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('/', array('as' => 'home', function(){
	return View::make('coming_soon');
}));

Route::get('request',array('as'=>'tempRuquest', 'uses' => 'HomeController@getRequest'));


/**
 * Test Page 
 */
Route::get('test0', array('as' => 'test', function(){
	return View::make('frontend.test0');
}));

Route::get('test1', array('as' => 'test', function(){
	return View::make('frontend.test1');
}));





