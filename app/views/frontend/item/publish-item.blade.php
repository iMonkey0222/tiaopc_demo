@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Publish Item ::
@parent
@stop

@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>发布出售</h3>
        <span>我的二手电子产品</span>
 		<ol class="breadcrumb">
            <li class="active"><h5><a class="icon-home" href="{{ route('home') }}">主页</a></h5></li>
        </ol>
    </div>
</section>
@stop



{{-- Page content --}}
@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="col-md-3 nobottommargin">
				{{-- This is left side bar --}}

			</div>

			<div class="col-md-6 nobottommargin">
				{{-- Publish Form Start		 --}}
				{{Form::open(array('route'=>'publish/item', 'files' => true, 'class'=>'form-horizontal'))}}

				<!-- CSRF Token -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />

				<!-- Title -->
				<div class="form-group{{ $errors->first('title', ' error') }}">
				<label class="control-label" for="title">标题</label>
					<div class="controls">
						<input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title') }}" />
						{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					</div>
				</div>


				<!-- Location -->
				<div class="form-group{{ $errors->first('location', ' error') }}">
					<label for="location" class="control-label">物品所在地</label>
					
					<div class="controls">
						<select id="location" class="form-control" name="location" onChange="itemPriceTag(this);">
						    <option value="" selected="selected" disabled="disabled">-- 请选择物品所在地 --</option>
							<option value="1">英国 利物浦</option>
							<option value="2">中国 苏州</option>
						</select> 	
						{{ $errors->first('location', '<span class="help-block">:message</span>') }}
					</div>
					
				</div>


				<!-- Dispaly Price based on location -->
				<div class="form-group{{ $errors->first('price', ' error') }}">
				<label class="control-label" for="price">价格</label>
					<div class="input-group">
						<div id = "price-tag" class="input-group-addon">£</div>
						<input type="text" class="form-control" name="price" id="price" value="{{ Input::old('price') }}" />
					</div>
						{{ $errors->first('price', '<span class="help-block">:message</span>') }}
					
				</div>

			   
				<!-- Category -->
				<div class="form-group{{ $errors->first('category', ' error') }}">

					<label class="control-label" for="category">分类</label>
				
						<div class="clear"></div>
						<div class="col_one_third">
							{{-- category1 into category --}}
							<select class="form-control" name="category" id="category">
						      	<option value="" selected="selected" disabled="disabled">选择一个分类</option>

								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>  
						</div>
						<div class="col_one_third" id="subCategory">
							<select class="form-control" name="category2" id="category2"></select>
						</div>
						<div class="col_one_third col_last">
							<select class="form-control" name="category3" id="category3"></select>
						</div>
						<div class="clear"></div>
						{{-- error block --}}
						{{ $errors->first('category', '<span class="help-block">:message</span>') }}
				</div>



{{-- 				<!-- Category -->
				<div class="form-group{{ $errors->first('category', ' error') }}">
					<label class="control-label"  for="category">Category</label>
					<div class="controls">

						<select name="category" >
							@foreach ( $categories as $category )
								@if ($category->parent_id == NULL)
									<optgroup label="{{ ' --- '.$category->name.' --- ' }}" ></optgroup>
								@else
									<option name="category" id="category" value ="{{$category->id}}">
										{{{ $category->name }}}
									</option>
								@endif 

							@endforeach
						</select>
						{{ $errors->first('category', '<span class="help-block">:message</span>') }}
					</div>
				</div> --}}

				<!-- Product Condition -->
				<div class="form-group{{ $errors->first('condition', ' error') }}">
					<label class="control-label" for="condition">新旧程度</label>
{{-- 					<div class="controls">
						<input type="text" class="form-control" name="condition" id="condition" value="{{ Input::old('condition') }}" />

					</div> --}}
					<select class="form-control" name="condition">
				      <option value="" selected="selected" disabled="disabled">请选择一项程度描述</option>
					@foreach ($condition as $key => $value)
						<option value={{$key}}>{{    $key."成新 ".$value}}</option>
					@endforeach
					</select>

					{{ $errors->first('condition', '<span class="help-block">:message</span>') }}
				</div>


				<!-- Picture Upload -->
				<div class="form-group{{ $errors->first('picture', ' error') }}">
					<label class="control-label" for="picture" data-toggle="tooltip" data-placement="left" title="" data-original-title="Each picture file should no more than 1.5 MB.">
						<i class = "icon-bulb"></i> 
						上传图片</label> 
						<span class="label label-warning">
							<i class="icon-bell"></i>
							请 至 少 上 传  3  张 图 片
						</span> 
						<br>
					<div class="controls">
						<!-- <input type="file" name="picture" id="picture"  /> -->
						<div class="col_half">{{ Form::file('mainPicture') }} </div>
						<div class="col_half col_last"> 
							
							{{-- <a class = "btn"> --}}
								<i class="icon-bell"></i> 请选择一张封面图片（此图将成为产品主图）
							{{-- </a> --}}
						</div>

						<div class="col_half">{{ Form::file('picture') }} </div>
						<div class="col_half col_last"> <i class="icon-bell"></i>请选择一张图片</div>


						<div class="col_half" >{{ Form::file('pictures[]', array('multiple'=>true)) }} </div>

						<div class="col_half col_last"> <i class="icon-bell"></i>此处可传<strong> 多张</strong> 图片 (数量>= 1)</div>
						{{ $errors->first('picture', '<span class="help-block">:message</span>') }}

					</div>
				</div>


				<!-- Description -->
				<div class="form-group{{ $errors->first('description', ' error') }}">
					<label class="control-label" for="description">物品描述</label>
					<div class="controls">
						<textarea class="form-control" rows="4" name="description" id="description" value="description" >{{ Input::old('description') }}</textarea>
						{{ $errors->first('description', '<span class="help-block">:message</span>') }}
					</div>
				</div>



				<hr>

				<!-- Form actions -->
				<div class="form-group">
					<div class="controls">
						<a class="btn" href="{{ route('home') }}">取消</a>

						<button type="submit" class="btn btn-default">确认发布</button>
					</div>
				</div>
				{{Form::close() }}
			</div>
			<div class="col-md-3 col_last">
				{{-- This is right side bar --}}
			</div>

			
		</div>
	</div>
</section>	


<script id="item-location" type="text/javascript">

	function itemPriceTag(selection){
		var selected = selection.options[selection.selectedIndex].value;
		// var text = selection.options[selection.selectedIndex].text;
		if(selected == 2){
			// alert(selected);
  			document.getElementById("price-tag").innerHTML = "￥";
  		} 
  		if(selected == 1){
  			document.getElementById("price-tag").innerHTML = "£";
  		}
	}
</script>


<script id="select-category" type="text/javascript">

	$(document).ready(function(){
		$('#category2').hide();
		$('#category3').hide();

	});


	// $('#category1').on('change', function(e){
	// 	console.log(e);

	// 	$('#category2').show();


	// 	var category1_id = e.target.value;

	// 	if(category1_id != 12 || category1_id !=19){
	// 		$('#category3').attr('name','category3');
	// 		$('#category3').hide();
	// 	}

	// 	//ajax
	// 	$.get('{{ URL::route('getCategory') }}',{category1_id: category1_id}, function(data){
	// 		//Success callback
	// 		console.log(data);

	// 		// jQuery('<select/>', {
	// 		//    	class: 'form-control',
	// 		//    	name: 'sub-category',
	// 		//    	id: 'subCategory',
	// 		// }).appendTo('#subCategory');


	// 		$('#category2').empty();
	// 		$('#category2').append('<option value="" selected="selected" disabled="disabled">Select a Category</option>');

	// 		$.each(data, function(index, subCat){

	// 			if(subCat.id == 12 || subCat.id == 19 ){

	// 				$('#category2').append('<option id="Subcat'+ subCat.id +'" value="'+ subCat.id +'">'+subCat.name+'</option>' );

	// 			}
	// 			else{
	// 				$('#category2').append('<option value="'+ subCat.id +'">'+subCat.name+'</option>' );

	// 		} 

	// 		$('#category2').attr('name','category');



	// 		});

	// 		$('#category2').on('change', function(e){



	// 				var category2_id = e.target.value;

	// 				console.log(category2_id);

	// 				if(category2_id == 19 || category2_id == 12	){

	// 					console.log("ok");
	// 					$('#category2').attr('name','category2');

	// 					$('#category3').show();


	// 					$.get('{{ URL::route('getCategory') }}',{category2_id: category2_id}, function(data){
			
	// 						// console.log(category2_id);

	// 						$('#category3').empty();

	// 					    $('#category3').append('<option value="" selected="selected" disabled="disabled">Select a Category</option>'); 


	// 						$.each(data, function(index, subCat){

	// 							$('#category3').append('<option value="'+ subCat.id +'">'+subCat.name+'</option>' );


	// 						});

	// 						$('#category3').attr('name','category');

	// 				});	

	// 				}

	// 		});

	// 	});
	// });


</script>


<script id="fileupload" type="text/javascript">
	$('#fileupload').bind('fileuploadsend', function (e, data) {
    // This feature is only useful for browsers which rely on the iframe transport:
    if (data.dataType.substr(0, 6) === 'iframe') {
        // Set PHP's session.upload_progress.name value:
        var progressObj = {
            name: 'PHP_SESSION_UPLOAD_PROGRESS',
            value: (new Date()).getTime()  // pseudo unique ID
        };
        data.formData.push(progressObj);
        // Start the progress polling:
        data.context.data('interval', setInterval(function () {
            $.get('progress.php', $.param([progressObj]), function (result) {
                // Trigger a fileupload progress event,
                // using the result as progress data:
                e = $.Event( 'progress', {bubbles: false, cancelable: true});
                $.extend(e, result);
                ($('#fileupload').data('blueimp-fileupload') ||
                    $('#fileupload').data('fileupload'))._onProgress(e, data);
            }, 'json');
        }, 1000)); // poll every second
    }
}).bind('fileuploadalways', function (e, data) {
    clearInterval(data.context.data('interval'));
});

</script>

@stop
