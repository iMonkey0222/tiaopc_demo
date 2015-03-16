<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Tiaopc
			@show
		</title>
		<meta name="keywords" content="your, awesome, keywords, here" />
		<meta name="author" content="Patrick" />
		<meta name="description" content="This is a fresh new trade info sharing website, for the students of University of Liverpool" />
        <meta name="email" content="patrick.wang1029@gmail.com">

		<!-- Mobile Specific Metas ================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS ================================================== -->
		{{-- Original --}}
		{{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">  --}}
		{{-- New --}}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" />

	    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" />

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	    <!-- External JavaScripts
    	============================================= -->
	    <script type="text/javascript" src="{{ asset('assets/js/jquery.js')}}"></script>
	    <script type="text/javascript" src="{{ asset('assets/js/plugins.js')}}"></script>


	</head>



<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix" >

        <!-- Header
        ============================================= -->
        <header id="header" class="full-header " data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                         <a href="#" class="standard-logo" data-dark-logo="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}"><img src="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}" alt="Tiaopc Logo"></a>
                            <a href="#" class="retina-logo" data-dark-logo="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}"><img src="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}" alt="Tiaopc Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="dark">
							<ul>
								<li><a href="{{ route('home') }}">Home</a></li>
                                <li>
                                    <a href="{{ route('item') }}"><div>Item</div></a>
                                    <ul>
                                        <li><a href="{{ route('item/category', 1)}}"><div>手机</div></a></li>
                                        <li><a href="{{ route('item/category', 6)}}"><div>平板</div></a></li>
                                        <li><a href="{{ route('item/category', 11)}}"><div>电脑</div></a>
                                        <ul>
                                            <li><a href="{{ route('item/category', 12)}}"><div>台式机</div></a></li>
                                            <li><a href="{{ route('item/category', 19)}}"><div>笔记本</div></a></li>
                                        </ul>                                           
                                        </li>
                                        <li><a href="{{ route('item/category', 24)}}"><div>外设</div></a></li>
                                    </ul>
                                </li>
								<li><a href="{{ URL::to('about-us') }}">About us</a></li>
								<li ><a href="{{ URL::to('contact-us') }}">Contact us</a></li>
								@if (Sentry::check())
								<li ><a href="{{ route('publish/item') }}">Publish</a></li>
								@endif

							</ul>
                            
							<ul class="nav pull-right">
								@if (Sentry::check())

								<li>
									<a>
										<div>Welcome, {{ Sentry::getUser()->first_name }}</div>
					
									</a>
									<ul>
										@if(Sentry::getUser()->hasAccess('admin'))
										<li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
										@endif
										<li><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
										<li></li>
										<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
									</ul>
								</li>





								@else
								<li class="active"><a href="{{ route('signin') }}">Sign in</a></li>
								<li class="active"><a href="{{ route('signup') }}">Sign up</a></li>
								@endif
							</ul>		
                  
                            

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->

       

        <!-- Page Title Optional -->
        @yield('page-title')



		<!-- Notifications Optional -->
		@include('frontend/notifications')


		<!-- Content -->
		@yield('content')


        <!-- Footer
        ============================================= -->
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark" style="background: url({{ asset('assets/others/footer-bg.jpg')}}) repeat; background-size: 100% 100%;">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="widget clearfix">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

                            <div class="line" style="margin: 30px 0;"></div>

                            <div class="row">

                                <div class="col-md-3 col-sm-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-sm-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Portfolio</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-sm-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Corporate</a></li>
                                        <li><a href="#">Agency</a></li>
                                        <li><a href="#">eCommerce</a></li>
                                        <li><a href="#">Personal</a></li>
                                        <li><a href="#">One Page</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-sm-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Restaurant</a></li>
                                        <li><a href="#">Wedding</a></li>
                                        <li><a href="#">App Showcase</a></li>
                                        <li><a href="#">Magazine</a></li>
                                        <li><a href="#">Landing Page</a></li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small" style="color: #35BBAA;"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Total Downloads</h5>
                                </div>

                                <div class="col-md-6 bottommargin-sm">
                                    <div class="counter counter-small" style="color: #2CAACA;"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                    <h5 class="nobottommargin">Clients</h5>
                                </div>

                            </div>

                        </div>

                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Subscribe</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
                                $("#widget-subscribe-form").validate({
                                    submitHandler: function(form) {
                                        $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                        $(form).ajaxSubmit({
                                            target: '#widget-subscribe-form-result',
                                            success: function() {
                                                $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                $('#widget-subscribe-form').find('.form-control').val('');
                                                $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                                                SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div class="widget clearfix" style="margin-bottom: -20px;">

                            <div class="row">

                                <div class="col-md-6 clearfix bottommargin-sm">
                                    <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                                </div>
                                <div class="col-md-6 clearfix">
                                    <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                    </a>
                                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <div class="copyrights-menu copyright-links clearfix">
                            <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                        </div>
                        Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
                                <i class="icon-github"></i>
                                <i class="icon-github"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('assets/js/functions.js') }}"></script>
    </body

</html>
