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
		{{ Form::open(array('route'=>'quick-signup', 'files' => true, 'class'=>'form-horizontal')) }}
{{-- 		<form method="post" action="{{ route('signup') }}" class="form-horizontal" autocomplete="on"> --}}	
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<!-- The school address selection -->
			<input type="hidden" name="school_address" id="school_address" value="">


			<!-- Email For register   email2-->
			<div class="form-group{{ $errors->first('email2', ' error') }}">
				
				<label for="email2" class="col-sm-3 control-label" data-toggle="tooltip" data-placement="left" title="" data-original-title="此邮箱仅由于激活账户。"><i class = "icon-bulb"></i> 学校邮箱 (用于激活) *</label>
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
			
			{{-- Form::select('phone_country', Countries::getList(App::getLocale(), 'php', 'cldr')) --}}
	
			<hr>
				<h6>* 为必填</h6>

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
