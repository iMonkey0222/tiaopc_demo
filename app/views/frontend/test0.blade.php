@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Test By Yue Wang
@parent
@stop

{{-- Page Content --}}
@section('content')



{{-- 4/3/2015 --}}
<?php

$item = Item::find(52);

$price = new Price(['price' => '32']);

if($priceSave = $item->prices()->save($price))
{
	echo "ok";
}







?>






<?php
/*// get child category name
$parentCategory = Category::where('parent_id','=','1')->get(); 
// get all child category id
$categorySet = Category::where('parent_id','=','1')->lists('id'); 

// get all item that contains child category id
$items = Item::whereIn('category_id',$categorySet)->paginate(10); 

// get the main picture of the item
$itemPicture = Item::find(4)->pictures()->where('status','=','1')->first();

$pictureName = $itemPicture['picture_name'];


foreach ($items as $item)
{
	$itemPicture = Item::find($item->id)->pictures()->where('status','=','1')->first();

	$pictureName = $itemPicture['picture_name'];

	$itemArray = array_add($item, "picture_name", $pictureName);

		// Get the newest price
	$priceArray = Item::find($item->id)->prices->first(); 
	// get the first/newest priceArray
	$newestPrice = $priceArray['price'];
	
	$itemArray = array_add($item, 'price',"$newestPrice");

}

echo $itemArray;*/


?>





{{-- 
{{ $items->links() }}
 --}}




















<?php
// $data = Session::all();
// var_dump($data);
// echo "<br>";
// echo "error is ";
// var_dump($errors->first());
// echo "<br>";





// $item = Item::where('category_id', '=', '15')->count();

// $categoryName = Category::where('parent_id','=','1')->get()->toArray();
// $datas = Category::where('parent_id','=','1')->lists('id'); // Given a specifyied attr

// // var_dump($item);

// echo "<pre>", var_dump($datas), "</pre>";



// foreach ($datas as $data){
// 	echo $data;
// }



// $child = Category::find(6)->getChildItem->lists('title');
// 

// $array = array(2,3,4,5,);


// $datas = Category::where('parent_id','=','1')->lists('id'); // get all child category id

// $child = Item::whereIn('category_id',$datas)->lists('title'); // get all item that contains child category id

// var_dump($child);
// $path = asset('assets/img/IMG_0635.jpg');

// echo $path;

// $img = Image::make($path);


// $img->fit(640,640);
// $img->save('assets/img/new.jpg');


// var_dump($img);





// $env = App::environment();

// echo $env;

// echo "<br>";

// echo $_SERVER['SERVER_NAME'];
// $item = User::find(3)->getItems;
// 
// 
// echo gethostname();

// var_dump($item);
// $categories = [
//   ['id' => 1, 'name' => '手机', 'children' => [
// 	  ['id' => 2, 'name' => '苹果'],
// 	  ['id' => 3, 'name' => '三星'],
// 	  ['id' => 4, 'name' => 'HTC'],
// 	  ['id' => 5, 'name' => '其他']
//   ]],
//   ['id' => 6, 'name' => '平板', 'children' => [
// 	  ['id' => 7, 'name' => '苹果'],
// 	  ['id' => 8, 'name' => '联想'],
// 	  ['id' => 9, 'name' => '微软'],
// 	  ['id' => 10, 'name' => '其他']
//   ]],
//   ['id' => 11, 'name' => '电脑', 'children' => [
//       ['id' => 12, 'name' => '台式机', 'children' =>[
//       	['id' => 13, 'name' => '整机'],
//       	['id' => 14, 'name' => 'CPU'],
//       	['id' => 15, 'name' => '内存条'],
//       	['id' => 16, 'name' => '显卡'],
//       	['id' => 17, 'name' => '硬盘'],
//       	['id' => 18, 'name' => '其他']
//       ]],
//       ['id' => 19, 'name' => '笔记本', 'children' =>[
//       	['id' => 20, 'name' => '游戏型'],
//       	['id' => 21, 'name' => '全能型'],
//       	['id' => 22, 'name' => '办公型'],
//       	['id' => 23, 'name' => '其他']
//       ]]
//    ]],
//    ['id' => 24, 'name' => '外设', 'children' => [
//       // These will be created
//       ['id' => 26, 'name' => '鼠标'],
//       ['id' => 27, 'name' => '键盘'],
//       ['id' => 28, 'name' => '耳机'],
//       ['id' => 29, 'name' => '音响'],
//       ['id' => 30, 'name' => '游戏主机'],
//       ['id' => 31, 'name' => '显示器'],
//       ['id' => 32, 'name' => '其他']
//     ]]
// ];

// Category::buildTree($categories); // => true



// $node = Category::get();


// var_dump($node->siblings());


// foreach ($node as $children) 
// {
// 	var_dump($children->name);
// }

// var_dump($node[1]->name);


// $destinationPath ='./public/assets/img/';
// echo public_path().'/assets/img';

// echo $info;
// echo Lang::get('auth/message.test');
 
// echo date("Ymdhis") . str_random(3); 

?>



{{-- 
{{ HTML::image('assets/img/new.jpg')}}

{{ HTML::image('assets/img/IMG_0635.jpg')}} --}}



@stop