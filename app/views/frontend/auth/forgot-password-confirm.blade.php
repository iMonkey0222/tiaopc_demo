
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Reset Password ::
@parent
@stop

{{-- Page title --}}
@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h1>Password Assistance</h1>
        <span><h4>Create your new password</h4></span>
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
				<form method="post" action="" class="form-horizontal">				
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />

					
					<!-- New Password -->
					<div class="form-group{{ $errors->first('password', ' error') }}">
						<label for="password" class="col-sm-3 control-label">New Password</label>
					  	<div class="col-sm-7">
							<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
							{{ $errors->first('password', '<span class="help-block">:message</span>') }}
						</div>
					  
					</div>

					<!-- Confirm New Password  -->
					<div class="form-group{{ $errors->first('password', ' error') }}">
					  	<label for="password_confirm" class="col-sm-3 control-label">Confirm Password</label>
					  	<div class="col-sm-7">
					  
						    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm New Password">
						    {{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
						</div>
					 
					</div>

						
{{-- 					<div class="control-group{{ $errors->first('password', ' error') }}">
						<label class="control-label" for="password">New Password</label>
						<div class="controls">
							<input type="password" name="password" id="password" value="" />
							{{ $errors->first('password', '<span class="help-block">:message</span>') }}
						</div>
					</div>

				
					<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
						<label class="control-label" for="password_confirm">Confirm New Password</label>
						<div class="controls">
							<input type="password" name="password_confirm" id="password_confirm" value="" />
							{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
						</div>
					</div> --}}

					<hr>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
							<button type="submit" class="btn  btn-default">Update Password</button>
						</div>
					
					</div>
				</form>	

				<div class="container clearfix">
					<h5 class="text-uppercase">Secure password tips:</h5>
					<p class="text-justify">	
						<li>
							Use at least 8 characters, a combination of numbers and letters is best.
						</li>
						<li>
							Do not use the same password you have used with us previously.
						</li>
						<li>
							Do not use dictionary words, your name, e-mail address, or other personal information that can be easily obtained.
						</li>
						<li>
							Do not use the same password for multiple online accounts.
						</li>		
					</p>
				</div>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
		</div>
	</div>
</section>
@stop