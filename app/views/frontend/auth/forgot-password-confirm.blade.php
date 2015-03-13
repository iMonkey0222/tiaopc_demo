
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Forgot Password ::
@parent
@stop

{{-- Page content --}}
@section('content')
<form method="post" action="" class="form-horizontal">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- New Password -->
	<div class="control-group{{ $errors->first('password', ' error') }}">
		<label class="control-label" for="password">New Password</label>
		<div class="controls">
			<input type="password" name="password" id="password" value="" />
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Confirm New Password  -->
	<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
		<label class="control-label" for="password_confirm">Confirm New Password</label>
		<div class="controls">
			<input type="password" name="password_confirm" id="password_confirm" value="" />
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Update Password</button>

			<!-- add forgot password link -->
<!-- 			<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
 -->
		</div>
	</div>
</form>
@stop