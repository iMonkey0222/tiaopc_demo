@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Change your Email
@stop

@section('account-page-title')
    <h3>My Profile</h3>
    <span><h4>Change My Email</h4></span>
@stop


{{-- Account page content --}}
@section('account-content')
<form method="post" action="" class="form-horizontal" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Form type -->
	<input type="hidden" name="formType" value="change-email" />

	<!-- New Email -->
	<div class="form-group{{ $errors->first('email', ' error') }}">
		<label class="col-sm-3 control-label" for="email">New Email</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="email" id="email" value="" placeholder="new email address "/>
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Confirm New Email -->
	<div class="form-group{{ $errors->first('email_confirm', ' error') }}">
		<label class="col-sm-3 control-label" for="email_confirm">Confirm New Email</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="email_confirm" id="email_confirm" value="" placeholder="confirm your new email address"/>
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Current Password -->
	<div class="form-group{{ $errors->first('current_password', ' error') }}">
		<label class="col-sm-3 control-label" for="current_password">Password</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" name="current_password" id="current_password" value="" placeholder="your account password"/>
			{{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<!-- Form actions -->
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button type="submit" class="btn btn-default">Update Email</button>

			<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
		</div>
	</div>
</form>
@stop