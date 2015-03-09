@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Publish Item ::
@parent
@stop

@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>Publish Item</h3>
        <span>Publish New Single Item</span>
 		<ol class="breadcrumb">
            <li class="active"><h5><a class="icon-home" href="http://tiaopc.com/">Home</a></h5></li>
        </ol>
    </div>
</section>
@stop

@section('account-page-title')
    <h3>Sell an Item</h3>
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
					<div class="controls">
						<input type="text" class="form-control" name="price" id="price" value="{{ Input::old('price') }}" />
						{{ $errors->first('price', '<span class="help-block">:message</span>') }}
					</div>
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
				<div class="form-group{{ $errors->first('condition', ' error') }}">
					<label class="control-label" for="condition">Condition</label>
					<div class="controls">
						<input type="text" class="form-control" name="condition" id="condition" value="{{ Input::old('condition') }}" />
						{{ $errors->first('condition', '<span class="help-block">:message</span>') }}
					</div>
				</div>

				<!-- Picture Upload -->
				<div class="form-group{{ $errors->first('picture', ' error') }}">
					<label class="control-label" for="picture">Picture Upload</label>
					<div class="controls">
						<!-- <input type="file" name="picture" id="picture"  /> -->
						<div class="col_half"> {{ Form::file('mainPicture') }} </div>
						<div class="col_half col_last" > {{ Form::file('pictures[]', array('multiple'=>true)) }} </div>

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
@stop
