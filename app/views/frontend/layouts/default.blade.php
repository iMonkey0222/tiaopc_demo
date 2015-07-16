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



		<!-- CSS ================================================== -->
		{{-- New --}}

        {{-- Bootstrap Modal --}}
         <link rel="stylesheet" href="{{ cdn('assets/css/bootstrap-modal-bs3patch.css') }}" type="text/css" />
         <link rel="stylesheet" href="{{ cdn('assets/css/bootstrap-modal.css') }}" type="text/css" />
        {{-- Others  --}}
        {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>--}}
	    {{--<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />--}}
	    <link rel="stylesheet" href="{{ cdn('assets/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ cdn('assets/css/style.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ cdn('assets/css/dark.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ cdn('assets/css/font-icons.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ cdn('assets/css/animate.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ cdn('assets/css/magnific-popup.css') }}" type="text/css" />
	    <link rel="stylesheet" href="{{ cdn('assets/css/responsive.css') }}" type="text/css" />

        <!-- Mobile Specific Metas ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- fineUploader css --}}
        <link rel="stylesheet" href="{{ cdn('assets/css/fine-uploader.min.css') }}" type="text/css" />
        {{-- RS css --}}
        <link rel="stylesheet" href="{{ cdn('assets/css/rs/settings.css') }}" media="screen" type="text/css" />




        <!-- External JavaScripts
        ============================================= -->
        <script type="text/javascript" src="{{ cdn('assets/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{ cdn('assets/js/plugins.js')}}"></script>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <![endif]-->

        <!-- Upload JavaScripts
        ============================================= -->
        <script type="text/javascript" src="{{ cdn('assets/js/jquery.fine-uploader.min.js')}}"></script>
        <!-- MixitUp JavaScripts
        ============================================= -->

        <!-- RS JavaScripts
        ============================================= -->
        <script type="text/javascript" src="{{ cdn('assets/js/rs/jquery.themepunch.revolution.min.js')}}"></script>
        <script type="text/javascript" src="{{ cdn('assets/js/rs/jquery.themepunch.tools.min.js')}}"></script>


        {{--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>--}}


        {{-- Notification Aumatically Fade out --}}
        <script type="text/javascript">
            $(document).ready (function(){
                $(".alert").alert();
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 5000);
            });

        </script>



        <!-- Google Anaytics -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60250899-1', 'auto');
          ga('send', 'pageview');
       </script>






       <style type="text/css">

        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }
       </style>


	</head>



<body class="stretched ">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix" >

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header" data-sticky-class="not-dark">
        <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                         <a href="{{ route('home') }}" class="standard-logo" data-dark-logo="{{ cdn('assets/others/icons/logo-dark.png') }}"><img src="{{ cdn('assets/others/icons/logo-dark.png') }}" alt="Tiaopc Logo"></a>
                            <a href="{{ route('home') }}" class="retina-logo" data-dark-logo="{{ cdn('assets/others/icons/logo-dark.png') }}"><img src="{{ cdn('assets/others/icons/logo-dark.png') }}" alt="Tiaopc Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="">
                            <ul>
                                <li><a href="{{ route('home') }}">主页</a></li>
                                <li>
                                    <a href="#"><div>电子产品</div></a>
                                    <ul>
                                        <li><a href="{{ route('item/list', array('location_name' => 'liverpool' ,'category_id'=> 0, 'sort_id' => 0 )) }}"><div>利物浦地区</div></a></li>
                                        <li><a href="{{ route('item/list', array('location_name' => 'suzhou' ,'category_id'=> 0, 'sort_id' => 0 )) }}"><div>苏州地区</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('how-to-use') }}">使用指南</a></li>                                
                                <li><a href="{{ route('about-us') }}">关于我们</a></li>
                                @if (Sentry::check())
                                <li ><a href="{{ route('publish/item') }}">发布产品</a></li>
                                @endif

                            </ul>
                            
                            <ul class="nav pull-right">
                                @if (Sentry::check())

                                <li>
                                    <a href="#">
                                        Welcome, {{ Sentry::getUser()->first_name }}
                    
                                    </a>
                                    <ul>
                                        @if(Sentry::getUser()->hasAccess('admin'))
                                        <li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
                                        @endif
                                        <li><a href="{{ route('profile') }}"><i class="icon-user"></i>我的账户</a></li>
                                        <li></li>
                                        <li><a href="{{ route('logout') }}"><i class="icon-off"></i>登出</a></li>
                                    </ul>
                                </li>





                                @else
                                <li class="active"><a href="{{ route('signin') }}">登录</a></li>
                                <li class="active"><a href="{{ route('signup-selection') }}">注册</a></li>
                                @endif
                            </ul>       
                  
                            

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="{{route('search')}}" method="get">
                                <input type="text" name="query" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
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



        <!-- Slider Section -->
        @yield('slider')

		<!-- Content -->
		@yield('content')


        <!-- Footer
        ============================================= -->
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark" style="background: url({{ cdn('assets/others/footer-bg.jpg')}}) repeat; background-size: 100% 100%;">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->


            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <div class="copyrights-menu copyright-links clearfix">
                            <a href="{{ route('home')}}">Home</a>/<a href="{{ route('about-us') }}">About</a>/<a href="{{ route('about-us') }} ">Feature</a>/<a href="{{ URL::to('how-to-use') }}">How to use</a>/
                            <a href="{{URL::to('policy')}}">Terms and Policy</a>
                        </div>
                        Copyrights &copy; 2015 All Rights Reserved by Tiaopc. 
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
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

    <script type="text/javascript" src="{{ cdn('assets/js/functions.js') }}"></script>


    {{-- Modal JS         --}}


    {{--
        <script type="text/javascript" src="{{ cdn('assets/js/bootstrap-modal.js')}}"></script>
    <script type="text/javascript" src="{{ cdn('assets/js/bootstrap-modalmanager.js')}}"></script>
    --}}

</body>

</html>
