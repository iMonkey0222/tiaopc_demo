@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Change your Email
@stop

@section('account-page-title')
    <h3>我的个人账户</h3>
    <span><h4>更新邮箱地址</h4></span>
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
		<label class="col-sm-3 control-label" for="email">新的邮箱地址</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="email" id="email" value="" placeholder="请输入新的邮箱地址"/>
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Confirm New Email -->
	<div class="form-group{{ $errors->first('email_confirm', ' error') }}">
		<label class="col-sm-3 control-label" for="email_confirm">确认新邮箱地址</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="email_confirm" id="email_confirm" value="" placeholder="请确认更新的邮箱地址"/>
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Current Password -->
	<div class="form-group{{ $errors->first('current_password', ' error') }}">
		<label class="col-sm-3 control-label" for="current_password">密码</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" name="current_password" id="current_password" value="" placeholder="请输入当前账户密码"/>
			{{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<hr>

	<!-- Form actions -->
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button type="submit" class="btn btn-default">确认更新</button>

			<a href="{{ route('forgot-password') }}" class="btn btn-link">我忘记密码了</a>
		</div>
	</div>
</form>
@stop