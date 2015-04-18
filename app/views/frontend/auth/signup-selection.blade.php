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
			<div class="col-md-3">		
			</div>		

			<div class="col-md-4">	

				 <div class="form-group">
					{{-- <div class="col-sm-offset-2 col-sm-10">	 --}}
						{{-- <button type="submit" class="button button-3d button-rounded nomargin" href="{{ URL::route('quick-signup')}}">一键注册</button>	 --}}
						<a href="{{ URL::route('quick-signup')}}" class="button button-xlarge tright">一键注册<i class="icon-circle-arrow-right"></i></a>
					{{-- </div> --}}
				</div>
			</div>


			<div class="col-md-4">	

				 <div class="form-group">
					{{-- <div class="col-sm-offset-2 col-sm-10">	 --}}
						{{-- <button type="submit" class="button button-3d button-rounded nomargin" href="{{ URL::route('signup')}}">自定义注册</button> --}}
						<a href="{{ URL::route('signup')}}" class="button button-xlarge tright">自定义注册<i class="icon-circle-arrow-right"></i></a>
					{{-- </div> --}}
				</div>
			</div>

			<div class="col-md-4">		
			</div>	
		</div>
		


		</div>
	</div>
</section>

@stop
