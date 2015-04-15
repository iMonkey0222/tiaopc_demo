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
        <h3>注册新账户</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">主页</a></li>
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
			<!-- The school address selection -->
			<input type="hidden" name="school_address" id="school_address" value="">

			<!-- User Name -->
			<div class="form-group{{ $errors->first('nickname', ' error') }}">
				<label for="first_name" class="col-sm-3 control-label">用户名 *</label>
				<div class="col-sm-8">

					<input type="text" class="form-control" name="nickname" id="nickname" value="{{ Input::old('nickname') }}" placeholder="用户名"/>
					{{ $errors->first('nickname', '<span class="help-block">:message</span>') }}
				</div>

			</div>

			<!-- First Name -->
			<div class="form-group{{ $errors->first('first_name', ' error') }}">
				<label for="first_name" class="col-sm-3 control-label">名 *</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" placeholder="名 (如：小小)"/>
					{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
				</div>

			</div>

			<!-- Last Name -->
			<div class="form-group{{ $errors->first('last_name', ' error') }}">
				<label for="last_name" class="col-sm-3 control-label">姓 *</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" placeholder="姓 (如： 王)"/>
					{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Email For register   email2-->
			<div class="form-group{{ $errors->first('email2', ' error') }}">
				
				<label for="email2" class="col-sm-3 control-label" data-toggle="tooltip" data-placement="left" title="" data-original-title="This email only used for activate account."><i class = "icon-bulb"></i> 学校邮箱 (用于激活) *</label>
{{-- 				 ( * Please enter the prefix of you school email.
				  This email will receive the validation link to active account. ) --}}
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control" name="email2" id="email2" value="{{ Input::old('email2') }}" placeholder="请输入您的学校邮箱账户名"/>
						{{-- <span id="email-postfix" class="input-group-addon"> @ liv.ac.uk</span> --}}

						<div class="input-group-btn">
							<button type="button" class="select-button btn btn-warning dropdown-toggle" data-toggle="dropdown"> - 请选择邮箱后缀 - <span class="caret"></span></button>
							<ul class="dropdown-menu">
          						<li id = "liv"><a href="#">@liv.ac.uk</a></li>
          						<li id = "xjtlu"><a href="#">@student.xjtlu.edu.cn</a></li>
        					</ul>
						</div> {{--button div--}}
						
					</div>
					{{ $errors->first('email2', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Email for register Confirm -->
			<div class="form-group{{ $errors->first('email2_confirm', ' error') }}">
				<label for="email2_confirm" class="col-sm-3 control-label">Confirm Email</label>
				<div class="col-sm-8">

					<div class="input-group">
						<input type="text" class="form-control" name="email2_confirm" id="email2_confirm" value="{{ Input::old('email2_confirm') }}" placeholder="请确认您的激活邮箱账户名"/>
						<span id="email-postfix" class="selected-school-address input-group-addon"> - 请选择邮箱后缀 - </span>
					</div>
					{{ $errors->first('email2_confirm', '<span class="help-block">:message</span>') }}
				</div>
			</div>


			<!-- Email for Future Login  email-->
			<div class="form-group{{ $errors->first('email', 'error') }}">
				<label for="email" class="col-sm-3 control-label" data-toggle="tooltip" data-placement="left" title="" data-original-title="此邮箱用于账户登录，请您牢记。"><i class = "icon-bulb"></i> 登录邮箱 (用于登录) *</label>
				<div class="col-sm-8">
					<div class="controls">
						<input type="text" class="form-control" name="email" id = "email" value="{{ Input::old('email') }}" placeholder="请输入邮箱地址"/>
						{{ $errors->first('email', '<span class="help-block">:message</span>') }}
						<!--Add annotaion in the right of future login email address-->
					</div>
				</div>
			</div>

			<!-- Email for Future Login Confirm -->
			<div class="form-group{{ $errors->first('email_confirm', 'error') }}">
				<label for="email_confirm" class="col-sm-3 control-label">确认登录邮箱 *</label>
				<div class="col-sm-8">
					<div class="controls">
						<input type="text" class="form-control" name="email_confirm" id = "email_confirm" value="{{ Input::old('email_confirm') }}" placeholder="请确认登录邮箱地址"/>
						{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
						<!--Add annotaion in the right of future login email address-->
					</div>
				</div>
			</div>

			
			<!-- Password -->
			<div class="form-group{{ $errors->first('password', ' error') }}">
				<label  for="password" class="col-sm-3 control-label">密码 *</label>
				<div class="col-sm-8">

					<div class="controls">
						<input type="password" class="form-control" name="password" id="password" value="" placeholder="至少5位"/>
						{{ $errors->first('password', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Password Confirm -->
			<div class="form-group{{ $errors->first('password_confirm', ' error') }}">
				<label for="password_confirm" class="col-sm-3 control-label">确认密码 *</label>
				<div class="col-sm-8">
					<div class="controls">
						<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="请与以上密码保持一致"/>
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Location -->
			<div class="form-group{{ $errors->first('location', ' error') }}">
				<label for="location" class="col-sm-3 control-label">所在城市 *</label>
				<div class="col-sm-8">
					<div class="controls">
						<select class="form-control" name="location" id="location">
						    <option value="" selected="selected" disabled="disabled">-- 请选择目前所在城市 --</option>
							<option value="1">英国 利物浦</option>
							<option value="2">中国 苏州</option>
						</select> 

						{{ $errors->first('location', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>	

			<!-- Phone Number -->
			<div class="form-group{{ $errors->first('phone_number', ' error') }}">
				<label for="phone_number" class="col-sm-3 control-label">联系电话 *</label>
				<div class="col-sm-8">
					<div class="controls">
						<input type="phone_number" class="form-control" name="phone_number" id="phone_number" value="" placeholder=" 如： 07408923674 或 13887253672"/>	

						{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Wei Xin -->
			<div class="form-group{{ $errors->first('weixin', ' error') }}">
				<label class="col-sm-3 control-label" for="weixin">微信</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="weixin" id="weixin" value="" placeholder="微信号码" />
					{{ $errors->first('weixin', '<span class="help-block">:message</span>') }}
				</div>
			</div>		

			<!-- QQ Number -->
			<div class="form-group{{ $errors->first('qq', ' error') }}">
				<label class="col-sm-3 control-label" for="qq">QQ</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="qq" id="qq" value="" placeholder="QQ号码"/>
					{{ $errors->first('qq', '<span class="help-block">:message</span>') }}
				</div>
			</div>
			
			{{-- Form::select('phone_country', Countries::getList(App::getLocale(), 'php', 'cldr')) --}}
	
			<hr>

			<!-- Form actions -->
			 <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">

					<a class="btn" href="{{ route('home') }}">取消</a>

					<button type="submit" class="button button-3d button-rounded nomargin">提交注册</button>
				</div>
			</div>

			{{ Form::close() }}
		{{-- </form> --}}
		</div>
	</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$('.dropdown-menu li').click(function(e){
		e.preventDefault();
  		// var selected = $(this).text();
  		var selectedValue = $(this).attr('id');
  		var selectedAddress = $(this).text();
  		$('.select-button').text(selectedAddress);
  		$('.selected-school-address').text(selectedAddress);
  		var elem= document.getElementById("school_address");
  		elem.value = selectedValue;  
  		alert(selected);
	});
</script>

@stop
