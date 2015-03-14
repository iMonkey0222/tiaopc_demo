
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop


@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>Sign in</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">Home</a></li>
            <li class="active icon-user">Sign in</li>
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
				<form method="post" action="{{ route('signin') }}" class="form-horizontal">		
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />



					<!-- Email -->
					<div class="form-group{{ $errors->first('email2', ' error') }}">
						<label for="email">Email</label>
				
						<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ Input::old('email') }}" />
							{{ $errors->first('email', '<span class="help-block">:message</span>') }}
					</div>

					<!-- Password -->
					<div class="form-group{{ $errors->first('password', ' error') }}">
						<label for="password">Password</label>
						<div class="controls">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
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
							

							<button type="submit" class="btn btn-default">Sign in</button>

							<a class="btn" href="{{ route('home') }}">Cancel</a>

							<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</section>
@stop
