@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>Sign in into your account</h3>
</div>
<div class="row">
	<div class="col-md-3">
		This for left side bar
	</div>
	<div class="col-md-6">
	<form method="post" action="{{ route('signin') }}" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- Email -->
		<div class="form-group{{ $errors->first('email', ' error') }}">
			<label for="email">Email</label>
	
			<input type="text" class="form-control" name="email" id="email" value="{{ Input::old('email') }}" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Password -->
		<div class="form-group{{ $errors->first('password', ' error') }}">
			<label for="password">Password</label>
			<div class="controls">
				<input type="password" class="form-control" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Remember me -->
		<div class="form-group">
			<div class="controls">
			<label class="checkbox">
				<input type="checkbox" name="remember-me" id="remember-me" value="1" /> Remember me
			</label>
			</div>
		</div>

		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<a class="btn" href="{{ route('home') }}">Cancel</a>

				<button type="submit" class="btn">Sign in</button>

				<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
			</div>
		</div>
	</form>
	</div>
</div>
@stop
