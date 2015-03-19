@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Profile page
@parent
@stop


@section('account-page-title')
    <h3>My Profile</h3>
    <span><h4>Update your Profile</h4></span>
@stop
{{-- Account Content --}}
@section('account-content')

<form method="post" action="" class="form-horizontal" autocomplete="off">
	<!-- CSRF Token to avoid across website attack-->
	<input type="hidden" name="_token" value="{{ csrf_token()}}"/>

	<!-- User Name -->
	<div class="form-group{{ $errors->first('nickname', ' error') }}">
		<label class="col-sm-3 control-label" for="nickname">User Name</label>
		<div class="col-sm-9">
			<input class="form-control" type="text" name="nickname" id="nickname" value="{{ Input::old('nickname', $user->nickname) }}" />
			{{ $errors->first('nickname', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- First Name -->
	<div class="form-group{{ $errors->first('first_name', ' error') }}">
		<label class="col-sm-3 control-label" for="first_name">First Name</label>
		<div class="col-sm-9">
			<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name',$user->first_name) }}" />
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Last Name -->
	<div class="form-group{{ $errors->first('last_name', ' error') }}">
		<label class="col-sm-3 control-label" for="last_name">Last Name</label>
		<div class="col-sm-9">
			<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name', $user->last_name) }}" />
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	
{{-- 	<!-- Email for Future Login -->
	<div class="control-group{{ $errors->first('login_email', 'error') }}">
		<label class="control-label" for="login_email">Email for Future Login </label>
		<div class="controls">
			<input class="span4" type="text" name="login_email" id = "login_email" value="{{ Input::old('login_email', $user->email2) }}" />
			{{ $errors->first('login_email', '<span class="help-block">:message</span>') }}
			<!--Add annotaion in the right of future login email address-->
		</div>
	</div> --}}

	<!-- Phone Number -->
	<div class="form-group{{ $errors->first('phone_number', ' error') }}">
		<label class="col-sm-3 control-label" for="phone_number">Phone Number</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ Input::old('phone_number', $user->phone_no) }}" />
			{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
		</div>
	</div>




	<hr>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button type="submit" class="btn btn-default">Update</button>
		</div>
	</div>

</form>

@stop