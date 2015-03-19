
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Test By Xiaoyang Wang
@parent
@stop

{{-- Page Content --}}
@section('content')
<h1>
	This is the test page by XYW
</h1>

<?php


// $user = Sentry::getUser();
		$originMainPic = Picture::where(function($query){
			$query	->where('item_id','=','53')
					->where('status','=','1');

		})->first();
// var_dump($originMainPic.'<br>');
echo $originMainPic->id;

$originPics = Item::find(53)->pictures;
foreach($originPics as $originPic){
	if($originPic->status == 1){
		$originMainPic = $originPic;
		break;
	}
}
echo $originMainPic->id;
// echo "<br><br>";
// echo "hi";
// echo $originMainPic['picture_name'];
// $items = User::find(5)->getItems;
// $item = Item::find(24);

// 	$item->title = 'This is Item 24';
// 		$item->category_id = '3';
// 		$item->product_condition = '7';
// 		$item->description = "Hello !!!!! Weclome to call me !!";
// $item->save();

// $price = new Price(['price' => '20']);

// echo "$item";

	// foreach ($items as $item) {
	// 	$itemID = $item->id;
	// 	// PriceArray variable is an array: id item_id price create_at updated_at
	// 	$priceArrays = Item::find($itemID)->prices; 
		
	// 	// get the first element of 
	// 	$newest = $priceArrays->first();
	// 	$newestPrice = $newest['price'];
	// 	echo "<br>";
	// 	// echo $itemID.' is '.$newestPrice;


	// 	array_add($item, 'price',"$newestPrice");

	// 		$pictures = Item::find($itemID)->pictures;
	// 		array_add($item, 'pictures', "$pictures");
	// 		// foreach ($pictures as $key => $value) {
	// 		// 	array_add($item, 'pictures', "$picture");
	// 		// }

	// 	echo "<br>";
	// 	// echo "$newestPrice";
	// 	echo "<br>";
	// 	echo $item;


	// 	// foreach ($priceArrays as $priceArray) {
	// 	// 	$createTimeArray = $priceArray->created_at;
	// 	// 	$price = $priceArray->price;

	// 	// 	//var_dump($itemID.'=='.$price.'created_at'.$createTimeArray);
	// 	// }
	// 	// // echo "<pre>";
	// 	// // echo ($priceArrays);
	// 	// // echo "<pre>";
	// }




?>
</p>
@stop




