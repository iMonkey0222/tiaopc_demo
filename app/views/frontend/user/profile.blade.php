@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Profile page
@parent
@stop


@section('account-page-title')
    <h3>我的个人账户</h3>
    <span><h4>修改个人资料</h4></span>
@stop
{{-- Account Content --}}
@section('account-content')

<form method="post" action="" class="form-horizontal" autocomplete="off">
	<!-- CSRF Token to avoid across website attack-->
	<input type="hidden" name="_token" value="{{ csrf_token()}}"/>

	@if(empty($user->nickname))
		<div class="col-sm-3"></div>
			{{-- <h6 >亲爱的用户，用户名一旦设置成功将无法更改</h6> --}}
		<h6>
			<i class="icon-flag"></i> 亲爱的用户，用户名一旦设置成功将无法更改,请您设置时仔细检查。
		</h6>
		<hr>

		<!-- User Name -->
		<div class="form-group{{ $errors->first('nickname', ' error') }}">
			<label for="first_name" class="col-sm-3 control-label">用户名 *</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="nickname" id="nickname" value="{{ Input::old('nickname') }}" placeholder="一旦设置成功将无法更改"/>
				{{ $errors->first('nickname', '<span class="help-block">:message</span>') }}
			</div>
		</div>

	@endif



	<!-- First Name -->
	<div class="form-group{{ $errors->first('first_name', ' error') }}">
		<label class="col-sm-3 control-label" for="first_name">名 *</label>
		<div class="col-sm-9">
			<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name',$user->first_name) }}" />
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Last Name -->
	<div class="form-group{{ $errors->first('last_name', ' error') }}">
		<label class="col-sm-3 control-label" for="last_name">姓 *</label>
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

	<!-- Location -->
	<div class="form-group{{ $errors->first('location', ' error') }}">
		<label for="location" class="col-sm-3 control-label">所在城市 *</label>
		<div class="col-sm-9">
			<div class="controls">
				<select class="form-control" name="location" id="location">
				    <option value="" disabled="disabled">-- Select a location --</option>
					<option value="1" {{ ($user->location == 1) ? 'selected = true' : ' ' }}>英国 利物浦</option>
					<option value="2" {{ ($user->location == 2) ? 'selected = true' : ' ' }}>中国 苏州</option>
				</select> 
			{{ $errors->first('location', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>

	<!-- Phone Number -->
	<div class="form-group{{ $errors->first('phone_number', ' error') }}">
		<label class="col-sm-3 control-label" for="phone_number">手机号码 *</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ Input::old('phone_number', $user->phone_no) }}" />
			{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Wei Xin -->
	<div class="form-group{{ $errors->first('weixin', ' error') }}">
		<label class="col-sm-3 control-label" for="weixin">微信</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="weixin" id="weixin" value="{{ Input::old('weixin', $user->weixin) }}" />
			{{ $errors->first('weixin', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- QQ Number -->
	<div class="form-group{{ $errors->first('qq', ' error') }}">
		<label class="col-sm-3 control-label" for="qq">QQ</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="qq" id="qq" value="{{ Input::old('qq', $user->qq) }}" />
			{{ $errors->first('qq', '<span class="help-block">:message</span>') }}
		</div>
	</div>



	<hr>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<button type="submit" class="btn btn-default">确认更新</button>
		</div>
	</div>

</form>

@stop