@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Publish Item ::
@parent
@stop

@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>Start Selling</h3>
        <span>Sell an Item</span>
 		<ol class="breadcrumb">
            <li class="active"><h5><a class="icon-home" href="http://tiaopc.com/">Home</a></h5></li>
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
				<label class="control-label" for="title">Title</label>
					<div class="controls">
						<input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title') }}" />
						{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					</div>
				</div>

				<!-- Price -->
				<div class="form-group{{ $errors->first('price', ' error') }}">
				<label class="control-label" for="price">Price</label>
					<div class="input-group">
						<div class="input-group-addon">£</div>
						<input type="text" class="form-control" name="price" id="price" value="{{ Input::old('price') }}" />
					</div>
						{{ $errors->first('price', '<span class="help-block">:message</span>') }}
					
				</div>

			   
				<!-- Category -->
				<div class="form-group{{ $errors->first('category', ' error') }}">

					<label class="control-label" for="category">Category</label>
				
						<div class="clear"></div>
						<div class="col_one_third">
							<select class="form-control" name="category1" id="category1">
						      	<option value="" selected="selected" disabled="disabled">Select a Category</option>

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
					<label class="control-label" for="condition">Condition</label>
{{-- 					<div class="controls">
						<input type="text" class="form-control" name="condition" id="condition" value="{{ Input::old('condition') }}" />

					</div> --}}
					<select class="form-control" name="condition">
				      <option value="" selected="selected" disabled="disabled">Select a Condition rate</option>
					@foreach ($condition as $key => $value)
						<option value={{$key}}>{{    $key."成新 ".$value}}</option>
					@endforeach
					</select>

					{{ $errors->first('condition', '<span class="help-block">:message</span>') }}
				</div>

				<!-- Picture Upload -->
				<div class="form-group{{ $errors->first('picture', ' error') }}">
					<label class="control-label" for="picture">Picture Upload</label>
					<div class="controls">
						<!-- <input type="file" name="picture" id="picture"  /> -->
						<div class="col_half"> {{ Form::file('mainPicture') }} </div>
						<div class="col_half col_last"> *Please Choose one main picture</div>


						<div class="col_half" > {{ Form::file('pictures[]', array('multiple'=>true)) }} </div>

						<div class="col_half col_last"> *Please Choose at least <strong>two</strong> pictures</div>
						{{ $errors->first('picture', '<span class="help-block">:message</span>') }}

					</div>
				</div>




				<!-- Description -->
				<div class="form-group{{ $errors->first('description', ' error') }}">
					<label class="control-label" for="description">Description</label>
					<div class="controls">
						<textarea class="form-control" rows="4" name="description" id="description" value="description" >{{ Input::old('description') }}</textarea>
						{{ $errors->first('description', '<span class="help-block">:message</span>') }}
					</div>
				</div>



				<hr>

				<!-- Form actions -->
				<div class="form-group">
					<div class="controls">
						<a class="btn" href="{{ route('home') }}">Cancel</a>

						<button type="submit" class="btn">Publish</button>
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


<script type="text/javascript">

	$(document).ready(function(){
		$('#category2').hide();
		$('#category3').hide();

	});


	$('#category1').on('change', function(e){
		console.log(e);

		$('#category2').show();


		var category1_id = e.target.value;

		if(category1_id != 12 || category1_id !=19){
			$('#category3').attr('name','category3');
			$('#category3').hide();
		}

		//ajax
		$.get('{{ URL::route('getCategory') }}',{category1_id: category1_id}, function(data){
			//Success callback
			console.log(data);

			// jQuery('<select/>', {
			//    	class: 'form-control',
			//    	name: 'sub-category',
			//    	id: 'subCategory',
			// }).appendTo('#subCategory');


			$('#category2').empty();
			$('#category2').append('<option value="" selected="selected" disabled="disabled">Select a Category</option>');

			$.each(data, function(index, subCat){

				if(subCat.id == 12 || subCat.id == 19 ){

					$('#category2').append('<option id="Subcat'+ subCat.id +'" value="'+ subCat.id +'">'+subCat.name+'</option>' );

				}
				else{
					$('#category2').append('<option value="'+ subCat.id +'">'+subCat.name+'</option>' );

			} 

			$('#category2').attr('name','category');



			});

			$('#category2').on('change', function(e){



					var category2_id = e.target.value;

					console.log(category2_id);

					if(category2_id == 19 || category2_id == 12	){

						console.log("ok");
						$('#category2').attr('name','category2');

						$('#category3').show();


						$.get('{{ URL::route('getCategory') }}',{category2_id: category2_id}, function(data){
			
							// console.log(category2_id);

							$('#category3').empty();

						    $('#category3').append('<option value="" selected="selected" disabled="disabled">Select a Category</option>'); 


							$.each(data, function(index, subCat){

								$('#category3').append('<option value="'+ subCat.id +'">'+subCat.name+'</option>' );


							});

							$('#category3').attr('name','category');

					});	

					}

			});

		});
	});

</script>


<script type="text/javascript">

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
