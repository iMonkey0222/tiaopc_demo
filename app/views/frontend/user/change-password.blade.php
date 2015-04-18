@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
change your password
@parent
@stop

@section('account-page-title')
    <h3>我的个人账户</h3>
    <span><h4>修改密码</h4></span>
@stop


{{-- Account Content --}}
@section('account-content')
<form method="post" action="" class="form-horizontal" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<!-- Old Password -->
	<div class="form-group{{ $errors->first('old_password', ' error') }}">
		<label class="col-sm-3 control-label" for="old_password">旧密码</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" name="old_password" id="old_password" value="" placeholder="当前账户密码"/>
			{{ $errors->first('old_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- New Password -->
	<div class="form-group{{ $errors->first('password', ' error') }}">
		<label class="col-sm-3 control-label" for="password">新密码</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" name="password" id="password" value="" placeholder="请输入新密码"/>
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Confirm New Password  -->
	<div class="form-group{{ $errors->first('password_confirm', ' error') }}">
		<label class="col-sm-3 control-label" for="password_confirm">确认新密码</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="请与以上密码一致"/>
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			
			<button type="submit" class="btn btn-default">确认更新</button>
			<a href="{{ route('forgot-password') }}" class="btn btn-link">我忘记了密码</a>

			<!-- add forgot password link -->
<!-- 			<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
 -->
		</div>
	</div>
</form>
@stop





