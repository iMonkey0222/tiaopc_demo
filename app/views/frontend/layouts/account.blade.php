@extends('frontend/layouts/default')

@section('page-title')

<section id="page-title">
    <div class="container clearfix">
		@yield('account-page-title')
        <ol class="breadcrumb">
            <li class="active"><h5><a class="icon-home" href="http://tiaopc.com/">Home</a></h5></li>
            <li></li>
            <li class="active"><h5><a class="icon-tag" href="http://tiaopc.com/publish">Sell an Item</a></h5></li>
        </ol>
    </div>

</section>

@stop


{{-- Page content --}}
@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="col-md-3 nobottommargin">

						<ul class="nav nav-list">
							<li class="nav-header">Main Menu</li>
							<li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::route('profile') }}">Profile</a></li>
							<li{{ Request::is('account/change-password') ? ' class="active"' : '' }}><a href="{{ URL::route('change-password') }}">Change Password</a></li>
							<li{{ Request::is('account/change-email') ? ' class="active"' : '' }}><a href="{{ URL::route('change-email') }}">Change Email</a></li>
							<li{{ Request::is('account/published-items') ? ' class="active"' : '' }}><a href="{{ URL::route('published-items') }}">My Published Products</a></li>		
							<li{{ Request::is('account/requested-items') ? ' class="active"' : '' }}><a href="{{ URL::route('requested-items') }}">My Requested Products</a></li>			
						</ul>

			</div>
			<div class="col-md-8 col_last nobottommargin">
				@yield('account-content')
			</div>


		</div>
	</div>
</section>

@stop
