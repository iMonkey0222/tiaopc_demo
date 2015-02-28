@extends('frontend/layouts/default')

@section('page-title')
<section id="page-title">

    <div class="container clearfix">
        <h3>Updage your account</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Update your account</li>
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
	<div class="span3">
		<ul class="nav nav-list">
			<li class="nav-header">Main Menu</li>
			<li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ URL::route('profile') }}">Profile</a></li>
			<li{{ Request::is('account/change-password') ? ' class="active"' : '' }}><a href="{{ URL::route('change-password') }}">Change Password</a></li>
			<li{{ Request::is('account/change-email') ? ' class="active"' : '' }}><a href="{{ URL::route('change-email') }}">Change Email</a></li>
			<li{{ Request::is('account/published-items') ? ' class="active"' : '' }}><a href="{{ URL::route('published-items') }}">My Published Products</a></li>

		</ul>
	</div>
	<div class="span9">
		@yield('account-content')
	</div>
</div>

</div>
</div>
</section>

@stop
