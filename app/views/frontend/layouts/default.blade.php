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
		<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

		<!-- Mobile Specific Metas ================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS ================================================== -->
		{{-- Original --}}
		{{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">  --}}
		{{-- New --}}
	    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" />

	    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" />


{{--

        <style>
        @section('styles')
        body {
            padding: 10px 0;
        }
        @show
        </style>--}}		

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

                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="dark">
							<ul>
								<li><a href="{{ route('home') }}">Home</a></li>
								<li><a href="{{ URL::to('about-us') }}">About us</a></li>
								<li ><a href="{{ URL::to('contact-us') }}">Contact us</a></li>
								<li ><a href="{{ route('item') }}">Item</a></li>
								@if (Sentry::check())
								<li ><a href="{{ route('publish/item') }}">Publish</a></li>
								@endif

							</ul>

							<ul class="nav pull-right">
								@if (Sentry::check())

								<li class="dropdown active">
									<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
										Welcome, {{ Sentry::getUser()->first_name }}
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
										@if(Sentry::getUser()->hasAccess('admin'))
										<li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
										@endif
										<li class="active" ><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
										<li class="divider"></li>
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
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_one_third">

                        <div class="widget clearfix">

                            <img src="images/footer-widget-logo.png" alt="" class="footer-logo">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.</p>

                            <div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third">

                        <div class="widget clearfix">
                            <h4>Client Testimonials</h4>

                            <div class="fslider testimonial no-image nobg noborder noshadow nopadding" data-animation="slide" data-arrows="false">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide">
                                            <div class="testi-image">
                                                <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                                <div class="testi-meta">
                                                    Steve Jobs
                                                    <span>Apple Inc.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="testi-image">
                                                <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                                <div class="testi-meta">
                                                    Collis Ta'eed
                                                    <span>Envato Inc.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="testi-image">
                                                <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                                <div class="testi-meta">
                                                    John Doe
                                                    <span>XYZ Inc.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="widget clearfix">

                            <a href="#" class="social-icon si-small si-rounded si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-github">
                                <i class="icon-github"></i>
                                <i class="icon-github"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-rounded si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget quick-contact-widget clearfix">

                            <h4>Send Message</h4>

                            <div id="quick-contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                            <form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">

                                <div class="form-process"></div>

                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" class="required form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
                                </div>
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="text" class="required form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
                                </div>
                                <textarea class="required form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
                                <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                                <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn btn-danger nomargin" value="submit">Send Email</button>

                            </form>

                            <script type="text/javascript">

                                $("#quick-contact-form").validate({
                                    submitHandler: function(form) {
                                        $(form).animate({ opacity: 0.4 });
                                        $(form).find('.form-process').fadeIn();
                                        $(form).ajaxSubmit({
                                            target: '#quick-contact-form-result',
                                            success: function() {
                                                $(form).animate({ opacity: 1 });
                                                $(form).find('.form-process').fadeOut();
                                                $(form).find('.form-control').val('');
                                                $('#quick-contact-form-result').attr('data-notify-msg', $('#quick-contact-form-result').html()).html('');
                                                SEMICOLON.widget.notifications($('#quick-contact-form-result'));
                                            }
                                        });
                                    }
                                });

                            </script>

                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyrights &copy; 2014 All Rights Reserved by Tiaopc.com
                        Power by Laravel 4.2
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <div class="copyrights-menu copyright-links nobottommargin">
                                <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                            </div>
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
    <script type="text/javascript" src="{{ asset('assets/js/functions.js') }}""></script>
    </body

</html>
