




<!DOCTYPE html>
<html dir="ltr" lang="en-US">
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
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="no-sticky transparent-header dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="index.html" class="standard-logo" data-dark-logo="For-all/tiaopc-logo5.png"><img src="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}" alt="Tiaopc Logo"></a>
                        <a href="index.html" class="retina-logo" data-dark-logo="For-all/tiaopc-logo5.png"><img src="{{ asset('assets/coming_soon/tiaopc-logo5.png') }}" alt="Tiaopc Logo"></a>
                    </div><!-- #logo end -->

                    <div class="fright dark hidden-sm hidden-xs clearfix" style="margin-top: 30px;">

                      

                    </div>

                </div>

            </div>

        </header><!-- #header end -->

        <section id="slider" class="full-screen dark" style="overflow: hidden;">

            <div class="container clearfix vertical-middle" style="z-index: 6;">

                <div class="heading-block title-center nobottomborder">
                    
                  <h1>Coming Soon</h1>
                    <span></span>

                </div>

                <div id="countdown-ex1" class="countdown countdown-large coming-soon divcenter bottommargin" style="max-width:700px;"></div>

                <div class="divider divider-center divider-short divider-margin"><i class="icon-time"></i></div>

                <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                   
                </form>

                <script>
                    jQuery(document).ready( function($){
                        var newDate = new Date(2015, 3-1, 21 );
                        $('#countdown-ex1').countdown({until: newDate});
                    });

                </script>

            </div>

            <div class="video-wrap">
                <video poster="{{ asset('assets/coming_soon/explore-poster.jpg')}}" preload muted autoplay loop>
                    <source src="{{ asset('assets/coming_soon/explore.mp4')}}"  type='video/mp4' />
                    <source src="{{ asset('assets/coming_soon/explore.webm')}}"  type='video/webm' />
                </video>
                <div class="video-overlay"></div>
            </div>

        </section>


    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <!-- Second page
    ============================================= -->
 <div class="section parallax full-screen nomargin noborder" style="background-image: url('{{ asset('assets/coming_soon/camera.jpg')}}');" data-stellar-background-ratio="0.4">
                    <div class="vertical-middle">
                        <div class="container clearfix">

                            <div class="col_three_fifth nobottommargin">

                                <div class="emphasis-title">
                                    <h3>Do you have electronic stuff on the shelf?</h3>
                                      <h3>   <h3>
                                    <font size="6" color="#C8C8C8">Like Laptop, Monitor and PlayStation.</font>
                                    <h3>   <h3>
                                    <h3>Bother to sell them?</h3>
                                      <h3>   <h3>
                                    <font size="6" color="#C8C8C8">Tiaopc.com </font>
                                    
                                    <font size="6" color="#C8C8C8">is a totally free and fair platform for you.</font>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('assets/js/functions.js') }}"></script>

</body>
</html>