@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Profile page
@parent
@stop

{{-- Account Content --}}
@section('account-content')

<h1>Now you've arrived to profile page</h1>
<div class="page-header">
	<h4>Update your Profile</h4>
</div>


<form method="post" action="" class="form-vertical" autocomplete="off">
	<!-- CSRF Token to avoid across website attack-->
	<input type="hidden" name="_token" value="{{ csrf_token()}}"/>


	<!-- First Name -->
	<div class="control-group{{ $errors->first('first_name', ' error') }}">
		<label class="control-label" for="first_name">First Name</label>
		<div class="controls">
			<input class="span4" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name',$user->first_name) }}" />
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Last Name -->
	<div class="control-group{{ $errors->first('last_name', ' error') }}">
		<label class="control-label" for="last_name">Last Name</label>
		<div class="controls">
			<input class="span4" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name', $user->last_name) }}" />
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	
	<!-- Email for Future Login -->
	<div class="control-group{{ $errors->first('login_email', 'error') }}">
		<label class="control-label" for="login_email">Email for Future Login</label>
		<div class="controls">
			<input class="span4" type="text" name="login_email" id = "login_email" value="{{ Input::old('login_email', $user->email2) }}" />
			{{ $errors->first('login_email', '<span class="help-block">:message</span>') }}
			<!--Add annotaion in the right of future login email address-->
		</div>
	</div>


	<hr>

	<div class="control-group">
		<div class="controls">
			<a class="btn" href="{{ route('home') }}">Cancel</a>
			<button type="submit" class="btn">save</button>
		</div>
	</div>

</form>
<p>
<h1>Now </h1>
</p>



@stop