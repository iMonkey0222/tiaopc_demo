@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Publish Item ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Publish</h3>

</div>
<div class="row">

		{{Form::open(array('route'=>'publish/item', 'files' => true, 'class'=>'form-horizontal'))}}

		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- Title -->
		<div class="control-group{{ $errors->first('title', ' error') }}">
		<label class="control-label" for="title">Title</label>
			<div class="controls">
				<input type="text" name="title" id="title" value="{{ Input::old('title') }}" />
				{{ $errors->first('title', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Price -->
		<div class="control-group{{ $errors->first('price', ' error') }}">
		<label class="control-label" for="price">Price</label>
			<div class="controls">
				<input type="text" name="price" id="price" value="{{ Input::old('price') }}" />
				{{ $errors->first('price', '<span class="help-block">:message</span>') }}
			</div>
		</div>




		<!-- Category -->
		<div class="control-group{{ $errors->first('category', ' error') }}">
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
		</div>

		<!-- Product Condition -->
		<div class="control-group{{ $errors->first('condition', ' error') }}">
			<label class="control-label" for="condition">Condition</label>
			<div class="controls">
				<input type="text" name="condition" id="condition" value="{{ Input::old('condition') }}" />
				{{ $errors->first('condition', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Picture Upload -->
		<div class="control-group{{ $errors->first('picture', ' error') }}">
			<label class="control-label" for="picture">Picture Upload</label>
			<div class="controls">
				<!-- <input type="file" name="picture" id="picture"  /> -->
				{{ Form::file('pictures[]', array('multiple'=>true)) }}
				{{ $errors->first('picture', '<span class="help-block">:message</span>') }}

			</div>
		</div>




		<!-- Description -->
		<div class="control-group{{ $errors->first('description', ' error') }}">
			<label class="control-label" for="description">Description</label>
			<div class="controls">
				<input type="text" name="description" id="description" value="{{ Input::old('description') }}" />
				{{ $errors->first('description', '<span class="help-block">:message</span>') }}
			</div>
		</div>



		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<a class="btn" href="{{ route('home') }}">Cancel</a>

				<button type="submit" class="btn">Publish</button>
			</div>
		</div>
		{{Form::close() }}
</div>
@stop
