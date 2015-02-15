@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Home page
@parent
@stop

{{-- Page Content --}}
@section('content')

<h1>Now you've arrived to home page</h1>


<p>
<?php
$data = Session::all();
var_dump($data);
echo "<br>";
echo "error is ";
var_dump($errors->first());
echo "<br>";


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



$node = Category::get();


// var_dump($node->siblings());


// foreach ($node as $children) 
// {
// 	var_dump($children->name);
// }

// var_dump($node[1]->name);


$destinationPath ='./public/assets/img/';
// echo public_path().'/assets/img';

// echo $info;
// echo Lang::get('auth/message.test');
 
// echo date("Ymdhis") . str_random(3); 

?>
</p>






@stop