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


			
				{{-- Publish Form Start		 --}}

			{{ Form::open(array('route'=>'reviseSingleItem', 'files' => true, 'class'=>'form-horizontal')) }}
				{{-- , 'action'=> array('ReviewPublishmentController@PostSingleItemEditForm',$item->id)--}}
				{{ Form::hidden('itemID', $item->id) }}
				{{--<input name="itemID" type="hidden" value="$item->id">--}}


				<!-- CSRF Token -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />

				<p>{{ $item->id }}</p>

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
				</div>

				<!-- Product Condition -->
				<div class="form-group{{ $errors->first('condition', ' error') }}">
					<label class="control-label" for="condition">Condition</label>
					<div class="controls">
						<input type="text" class="form-control" name="condition" id="condition" value="{{ Input::old('condition', $item->product_condition) }}" />
						{{ $errors->first('condition', '<span class="help-block">:message</span>') }}
					</div>
				</div>

				<!-- Picture Upload -->
				<div class="form-group{{ $errors->first('picture', ' error') }}">
					<label class="control-label" for="picture">Picture Upload  (Limitatiuon: 1-10)</label>
					<div class="controls">
						<div class="row portfolio-item" >
							

							@foreach ($pictures as $picture)
							<div class="col-xs-6 col-md-2 portfolio-image">
								<!-- Edit and delete icon -->
								<div class="portfolio-overlay">

									<a title="Edit Photo" href="" class="left-icon" data-lightbox="image">
										<i class="icon-line-plus"></i>
									</a>
                                    <a title="Remove Photo" href="portfolio-single.php" class="right-icon">
                                    	<i class="icon-line-ellipsis"></i>
                                    </a>
                                </div>

								 <a href="http://localhost:8888/tiaopc_demo/public/item/{{ $item->id }}" class="thumbnail">
	                       			<img alt="100%x180" src = {{asset("assets/img/$picture->picture_name")}} style="height: 180px; width: 100%; display: block;">
	                     		</a>
	                     		
	                   		</div>
							@endforeach


						</div>
						<!-- <input type="file" name="picture" id="picture"  /> -->
						{{ Form::file('pictures[]', array('multiple'=>true)) }}
						{{ $errors->first('picture', '<span class="help-block">:message</span>') }}

					</div>
				</div>

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

						<button type="submit" class="btn">Revise Listing</button>
					</div>
				</div>
				{{ Form::close() }}

				


@stop