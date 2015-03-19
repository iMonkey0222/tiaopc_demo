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
		<div class="col-md-2">
				
		</div>	

		<div class="col-md-8">
		{{ Form::open(array('route'=>'signup', 'files' => true, 'class'=>'form-horizontal')) }}
{{-- 		<form method="post" action="{{ route('signup') }}" class="form-horizontal" autocomplete="on"> --}}	
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />


			<!-- User Name -->
			<div class="form-group{{ $errors->first('nickname', ' error') }}">
				<label for="first_name" class="col-sm-3 control-label">User Name</label>
				<div class="col-sm-9">

					<input type="text" class="form-control" name="nickname" id="nickname" value="{{ Input::old('nickname') }}" placeholder="user name"/>
					{{ $errors->first('nickname', '<span class="help-block">:message</span>') }}
				</div>

			</div>

			<!-- First Name -->
			<div class="form-group{{ $errors->first('first_name', ' error') }}">
				<label for="first_name" class="col-sm-3 control-label">First Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" placeholder="your first name"/>
					{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
				</div>

			</div>

			<!-- Last Name -->
			<div class="form-group{{ $errors->first('last_name', ' error') }}">
				<label for="last_name" class="col-sm-3 control-label">Last Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" placeholder="your last name"/>
					{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Email For register   email2-->
			<div class="form-group{{ $errors->first('email2', ' error') }}">
				
				<label for="email2" class="col-sm-3 control-label" data-toggle="tooltip" data-placement="left" title="" data-original-title="This email only used for activate account."><i class = "icon-bulb"></i> Validation Email</label>
{{-- 				 ( * Please enter the prefix of you school email.
				  This email will receive the validation link to active account. ) --}}
				<div class="col-sm-9">
					<div class="input-group">
						
						<input type="text" class="form-control" name="email2" id="email2" value="{{ Input::old('email2') }}" placeholder="Enter your school account user name"/>
						<span id="email-postfix" class="input-group-addon"> @ liv.ac.uk</span>
						
					</div>
					{{ $errors->first('email2', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Email for register Confirm -->
			<div class="form-group{{ $errors->first('email2_confirm', ' error') }}">
				<label for="email2_confirm" class="col-sm-3 control-label">Confirm Email</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" name="email2_confirm" id="email2_confirm" value="{{ Input::old('email2_confirm') }}" placeholder="Confirm your school account user name"/>
						<span id="email-postfix" class="input-group-addon">@ liv.ac.uk</span>
					</div>
					{{ $errors->first('email2_confirm', '<span class="help-block">:message</span>') }}
				</div>
			</div>


			<!-- Email for Future Login  email-->
			<div class="form-group{{ $errors->first('email', 'error') }}">
				<label for="email" class="col-sm-3 control-label" data-toggle="tooltip" data-placement="left" title="" data-original-title="This email is used for further login and receive notification."><i class = "icon-bulb"></i> Login Email</label>
				<div class="col-sm-9">
					<div class="controls">
						<input type="text" class="form-control" name="email" id = "email" value="{{ Input::old('email') }}" placeholder="Enter the email address for future login"/>
						{{ $errors->first('email', '<span class="help-block">:message</span>') }}
						<!--Add annotaion in the right of future login email address-->
					</div>
				</div>
			</div>

			<!-- Email for Future Login Confirm -->
			<div class="form-group{{ $errors->first('email_confirm', 'error') }}">
				<label for="email_confirm" class="col-sm-3 control-label">Confirm Email</label>
				<div class="col-sm-9">
					<div class="controls">
						<input type="text" class="form-control" name="email_confirm" id = "email_confirm" value="{{ Input::old('email_confirm') }}" placeholder="Confirm the login email address"/>
						{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
						<!--Add annotaion in the right of future login email address-->
					</div>
				</div>
			</div>

			
			<!-- Password -->
			<div class="form-group{{ $errors->first('password', ' error') }}">
				<label  for="password" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">

					<div class="controls">
						<input type="password" class="form-control" name="password" id="password" value="" placeholder="At least 5 length"/>
						{{ $errors->first('password', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Password Confirm -->
			<div class="form-group{{ $errors->first('password_confirm', ' error') }}">
				<label for="password_confirm" class="col-sm-3 control-label">Confirm Password</label>
				<div class="col-sm-9">
					<div class="controls">
						<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="Confirm password"/>
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

						<!-- Password Confirm -->
{{-- 			<div class="form-group{{ $errors->first('password_confirm', ' error') }}">
				<label for="password_confirm">Confirm Password</label>
				<div class="controls">
					<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" />
					{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
				</div>
			</div> --}}

			

			<!-- Phone Number -->
			<div class="form-group{{ $errors->first('phone_number', ' error') }}">
				<label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
				<div class="col-sm-9">
					<div class="controls">
						<input type="phone_number" class="form-control" name="phone_number" id="phone_number" value="{{ Input::old('phone_number') }}" placeholder="Contact Number (i.e 07408923674)"/>	

						{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			
			{{-- Form::select('phone_country', Countries::getList(App::getLocale(), 'php', 'cldr')) --}}
	

			<hr>

			<!-- Form actions -->
			 <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">

					<a class="btn" href="{{ route('home') }}">Cancel</a>

					<button type="submit" class="btn btn-default">Sign up</button>
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
