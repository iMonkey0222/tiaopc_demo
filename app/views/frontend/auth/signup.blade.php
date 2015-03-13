@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign up ::
@parent
@stop

{{-- Page title in Page --}}
@section('page-title')
<section id="page-title">

    <div class="container clearfix">
        <h3>Sign up</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">Home</a></li>
        </ol>
    </div>

</section>
@stop


{{-- Page content --}}
@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

	<div class="row">
		<div class="col-md-3">
				
		</div>	

		<div class="col-md-6">
		{{ Form::open(array('route'=>'signup', 'files' => true, 'class'=>'form-horizontal')) }}
{{-- 		<form method="post" action="{{ route('signup') }}" class="form-horizontal" autocomplete="on"> --}}	
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />

			<!-- User Name -->
			<div class="form-group{{ $errors->first('nickname', ' error') }}">
				<label for="first_name">User Name</label>

					<input type="text" class="form-control" name="nickname" id="nickname" value="{{ Input::old('nickname') }}" />
					{{ $errors->first('nickname', '<span class="help-block">:message</span>') }}

			</div>

			<!-- First Name -->
			<div class="form-group{{ $errors->first('first_name', ' error') }}">
				<label for="first_name">First Name</label>

					<input type="text" class="form-control" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" />
					{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}

			</div>

			<!-- Last Name -->
			<div class="form-group{{ $errors->first('last_name', ' error') }}">
				<label for="last_name">Last Name</label>
				<div class="controls">
					<input type="text" class="form-control" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" />
					{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Email For register   email2-->
			<div class="form-group{{ $errors->first('email2', ' error') }}">
				<label for="email2">Email for Validation </label>
				 ( * Please enter the prefix of you school email.
				  This email will receive the validation link to active account. )
				<div class="input-group">
					
					<input type="text" class="form-control" name="email2" id="email2" value="{{ Input::old('email2') }}" />
					<span id="email-postfix" class="input-group-addon"> @ liv.ac.uk</span>
					
				</div>
				{{ $errors->first('email2', '<span class="help-block">:message</span>') }}
			</div>

			<!-- Email for register Confirm -->
			<div class="form-group{{ $errors->first('email2_confirm', ' error') }}">
				<label for="email2_confirm">Confirm Email</label>
				<div class="input-group">
					<input type="text" class="form-control" name="email2_confirm" id="email2_confirm" value="{{ Input::old('email2_confirm') }}" />
					<span id="email-postfix" class="input-group-addon">@ liv.ac.uk</span>
				</div>
				{{ $errors->first('email2_confirm', '<span class="help-block">:message</span>') }}
			</div>


			<!-- Email for Future Login  email-->
			<div class="form-group{{ $errors->first('email', 'error') }}">
				<label for="email">Email for Future Login </label>
				<div class="controls">
					<input type="text" class="form-control" name="email" id = "email" value="{{ Input::old('email') }}" />
					{{ $errors->first('email', '<span class="help-block">:message</span>') }}
					<!--Add annotaion in the right of future login email address-->
				</div>
			</div>

			<!-- Email for Future Login Confirm -->
			<div class="form-group{{ $errors->first('email_confirm', 'error') }}">
				<label for="email_confirm">Confirm Email</label>
				<div class="controls">
					<input type="text" class="form-control" name="email_confirm" id = "email_confirm" value="{{ Input::old('email_confirm') }}" />
					{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
					<!--Add annotaion in the right of future login email address-->
				</div>
			</div>

			
			<!-- Password -->
			<div class="form-group{{ $errors->first('password', ' error') }}">
				<label  for="password">Password</label>
				<div class="controls">
					<input type="password" class="form-control" name="password" id="password" value="" />
					{{ $errors->first('password', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Password Confirm -->
			<div class="form-group{{ $errors->first('password_confirm', ' error') }}">
				<label for="password_confirm">Confirm Password</label>
				<div class="controls">
					<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" />
					{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			
{{-- 			<!-- Phone Number -->
			<div class="form-group{{ $errors->first('phone_no', ' error') }}">
				<label for="phone_no">Phone Number</label>
				<div class="controls">
					<input type="phone_no" class="form-control" name="phone_no" id="phone_no" value="{{ Input::old('phone_no') }}" />
					{{ $errors->first('password', '<span class="help-block">:message</span>') }}
				</div>
			</div> --}}
			

			<!-- Phone Number -->
			<div class="form-group{{ $errors->first('phone_number', ' error') }}">
				<label for="phone_number">Phone Number</label>
				<div class="controls">
					<input type="phone_number" class="form-control" name="phone_number" id="phone_number" value="{{ Input::old('phone_number') }}" />

					{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			
			{{-- Form::select('phone_country', Countries::getList(App::getLocale(), 'php', 'cldr')) --}}
	

			<hr>

			<!-- Form actions -->
			<div class="control-group">
				<div class="controls">
					<a class="btn" href="{{ route('home') }}">Cancel</a>

					<button type="submit" class="btn">Sign up</button>
				</div>
			</div>
			{{ Form::close() }}
		{{-- </form> --}}
		</div>
	</div>
		</div>
	</div>
</section>
@stop
