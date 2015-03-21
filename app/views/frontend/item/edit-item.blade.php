@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Revise an Item ::
@parent
@stop

@section('account-page-title')
    <h3>Revising Item</h3>
    <span>{{ $item->title }}</span>
@stop





{{-- Page content --}}
@section('account-content')

<script id = "picturePreview" type="text/javascript">
		
// // Pre process the error msg    
// $.ajaxSetup({
//   error: function(xhr, status, error) {
//     alert("An AJAX error occured: " + status + "\nError: " + error);
//   }
// });


// $(document).ready(function() {

//     var options = { 
//         beforeSubmit:  showRequest,
//         success:       showResponse,
//         dataType: 'json'
//         }; 
//      $('body').delegate('#mainPicture','change', function(){
     	
//      	//alert('hiii, image input changes');
//          $('#upload').ajaxForm(options).submit();          
//      }); 
// });  
      	

       
function showRequest(formData, jqForm, options) { 
    $(".validation-errors").hide().empty();
    // $(".output").css('display','none');
    return true; 
} 
function showResponse(response, statusText, xhr, $form)  {
	// var response = JSON.parse(response); 
    if(response.success == false)
    {	
    	alert('false');
        var arr = response.errors;
        $.each(arr, function(index, value)
        {
            if (value.length != 0)
            {
                $(".validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
            }
        });
        $(".validation-errors").show();

    } else {
    	alert("I should display output");
    	$("#output").html("<h3>hi</h3>");
         $("#output").html("<img src='"+response.file+"' />");
         // $("#output").css('display','block');
    }
}

</script>


<section id="account-content">
			{{-- Publish Form Start		 --}}

			{{ Form::open(array('route'=>'postRevise', 'files' => true, 'class'=>'form-horizontal')) }}
				{{-- , 'action'=> array('ReviewPublishmentController@PostSingleItemEditForm',$item->id)--}}

				{{ Form::hidden('itemID', $item->id) }}
				{{--<input name="itemID" type="hidden" value="$item->id">--}}


				<!-- CSRF Token -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />

				<!-- Title -->
				<div class="form-group{{ $errors->first('title', ' error') }}">
					<label class="control-label" for="title">Title</label>
					<div class="controls">
						<input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title', $item->title) }}" />
						{{ $errors->first('title', '<span class="help-block">:message</span>') }}
					</div>
				</div>

				<!-- Price -->
				<div class="form-group{{ $errors->first('price', ' error') }}">
					<label class="control-label" for="price">Price (GB)</label>
					<div class="input-group">
						<span id="startPriceCurrSym" class="input-group-addon">£</span>
							<input type="text" class="form-control" name="price" id="price" value=" {{ Input::old('price', $item->price) }}" />
					</div>
							{{ $errors->first('price', '<span class="help-block">:message</span>') }}
					
				</div>


				<!-- Category -->
				<div class="form-group{{ $errors->first('category', ' error') }}">
					<label class="control-label"  for="category">Category *</label>
					<h5>Selected Category: {{$item->parent_category_name}}.{{$item->category_name}}</h5>
					<div class="controls">
						<div class="clear"></div>
						<div class="col_one_third">
							<select class="form-control" name="category1" id="category1">
						      	<option value="" selected="selected" disabled="disabled">Reselect a Category</option>

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
				</div>
{{-- 
				<div class="form-group{{ $errors->first('category', ' error') }}">
					<label class="control-label"  for="category">Category</label>
					<div class="controls">

						<select name="category" >
							@foreach ( $categories as $category )
								@if ($category->parent_id == NULL)
									<optgroup label="{{ ' --- '.$category->name.' --- ' }}" ></optgroup>
								@else

									<option  {{ ($item->category_id == $category->id) ? 'selected = true' : ' ' }} name="category" id="category" value ="{{$category->id}}">
										{{ $category->name }}
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

					<select class="form-control" name="condition">
				      <option value="" disabled="disabled">Select a Condition rate</option>
				      @foreach($condition as $key=> $value)
				      	<option {{ ($item->product_condition == $key) ? 'selected = true' : ' '}} value = {{$key}}>{{ $key."成新 ".$value}}</option> 
				      @endforeach
				    </select>
				    {{ $errors->first('condition', '<span class="help-block">:message</span>') }}
				</div>

				<!-- Picture Uploaded -->
{{-- 				<div class="form-group{{ $errors->first('condition', ' error') }}">
					<label class="control-label" for="condition"><i class="icon-picture"></i></label>
					<div class="controls">
						<div class="row portfolio-item" >
							<p>This is Main Picture</p>
							<a href="{{ route('singleItem', $item->id) }}">
								<img alt="100%x180" src = {{asset("assets/img/$mainPic->picture_name")}} style="height: 80px; width: 40%; display: block;">
							</a>
							
							
							<p>This are Pictures</p>
							@foreach ($pictures as $picture)								
								@if($picture->status == 0)
								<div class="col-xs-6 col-md-2 portfolio-image">
								<!-- Edit and delete icon -->
									<div class="portfolio-overlay">	
										<a title="Edit Photo" href="" data-lightbox="image">
											<i class="icon-trashcan"></i>
										</a>
	                                </div>
									 <a href="http://localhost:8888/tiaopc_demo/public/item/{{ $item->id }}" class="thumbnail">
		                       			<img alt="100%x180" src = {{asset("assets/img/$picture->picture_name")}} style="height: 180px; width: 100%; display: block;">
		                     		</a>		                     		
		                   		</div>

								@endif

							@endforeach
						</div>

					</div>
				</div>	 --}}		



				<!-- Picture Upload -->
{{-- 				<div class="form-group{{ $errors->first('picture', ' error') }}">
					<label class="control-label" for="picture">Picture Upload  (Limitatiuon: 1-10)</label>
					<div class="controls">
						<!-- <input type="file" name="picture" id="picture"  /> -->
						<div id = "mainPicture" class="col_half"> --}}
	{{-- 			            <div class="span3">
				                <div id="validation-errors"></div> --}}
				                <!-- pic upload form -->
				                {{-- <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ URL::route('imageUpload') }}" autocomplete="off"> --}}
                    				{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    				<input type="file" name="mainPicture" id="mainPicture" />  --}}
                				{{-- </form> --}}
				 			{{-- 	<div class="col_half col_last"> *Please Choose one main picture</div>
				            </div> --}}
				            
				            <div class="span5">
				            	<div>output</div>
				                <div id="output" name = "output"></div>

				            </div>
				        {{-- </div> --}}
{{-- 							{{ Form::file('mainPicture', 'mainPic', ['id' => 'mainPic'], array('route'=>'imageUpload')) }}  --}}

						{{-- <div id = "pics" class="col_half" > {{ Form::file('pictures[]', array('multiple'=>true)) }} </div> --}}

						{{-- <div class="col_half col_last"> *Please Choose at least <strong>two</strong> pictures</div> --}}
						{{-- {{ $errors->first('picture', '<span class="help-block">:message</span>') }} --}}

					{{-- </div> --}}
				{{-- </div> --}}

				<!-- Description -->
				<div class="form-group{{ $errors->first('description', ' error') }}">
					<label class="control-label" for="description">Description</label>
					<div class="controls">
						<textarea class="form-control" rows="4" name="description" id="description" value="description" >{{ Input::old('description',$item->description) }}</textarea>
						{{ $errors->first('description', '<span class="help-block">:message</span>') }}
					</div>
				</div>


				<hr>

				<!-- Form actions -->
				<div class="form-group">
					<div class="controls">
						<a class="btn" href="{{ route('home') }}">Cancel</a>

						<button type="submit" class="btn btn-default">Revise Listing</button>
					</div>
				</div>
				{{ Form::close() }}

</section>


<script id = "category" type="text/javascript">
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
@stop


@section('account-content1')
<section id="account-content">
<!-- Button trigger upload -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Launch modal</button>
<!--Modal-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Text in a modal</h4>
                        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

                        <h4>Popover in a modal</h4>
                        <p>This <a href="#" role="button" class="btn btn-default popover-test" title="" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">button</a> should trigger a popover on click.</p>

                        <h4>Tooltips in a modal</h4>
                        <p><a href="#" class="tooltip-test" title="" data-original-title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="" data-original-title="Tooltip">that link</a> should have tooltips on hover.</p>
                        <hr>
                        <h4>Overflowing text to show scroll behavior</h4>
                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        <p class="nobottommargin">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="line"></div>

						
</section>
@stop


{{-- 
<div class="row">
    <div class="span8">
        <!-- Post Title -->
        <div class="row">
            <div class="span8">
                <h4>Ajax Image Upload and Preview With Laravel</h4>
            </div>
        </div>
        <!-- Post Footer -->
        <div class="row">
            <div class="span3">
                <div id="validation-errors"></div>
                <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ URL::route('imageUpload') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="file" name="mainPicture" id="mainPicture" /> 
                </form>
 
            </div>
            <div class="span5">
            	<div>output</div>
                <div id="output"></div>
            </div>
        </div>
    </div>
</div>
 --}}

{{-- 	<div id = "mainPicture" class="col_half"> 
		<div id="validation-errors"></div>
		<form class="form-horizontal" id="upload" method="post" action="{{ URL::route('imageUpload') }}" autocomplete="off">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<input type="file" name="mainPic" id="mainPic" /> 
		</form>

	</div>

	<div class="col_half col_last"> 
		<div id = "output">
	
		</div>
		*Please Choose one main picture
	</div> --}}
