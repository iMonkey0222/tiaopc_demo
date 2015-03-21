@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Home page
@parent
@stop

@section('page-title')
@stop



@section('slider')

<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">

    <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">

            {{-- s1 --}}
            <div class="swiper-slide " style="background-image: url({{ asset('assets/others/homepage/s1.jpg')}});">
                <div class="container clearfix">
                    <div class="slider-caption slider-caption-left">
                        <h2 data-caption-animate="fadeInUp">欢迎来到</h2>
                        <h2 data-caption-animate="fadeInUp">Tiaopc v1.0</h2>                        
                        <p data-caption-animate="fadeInUp">这不仅仅只是一个闲置物品信息提供平台,也是你生活的一部分</p>
                    </div>
                </div>
            </div>
            {{-- s2 --}}
            <div class="swiper-slide" style="background-image: url({{ asset('assets/others/homepage/joboffer.jpg')}}) ;">
                <div class="container clearfix" >
                    <div class="slider-caption slider-caption-center">
                        <h2 data-caption-animate="fadeInUp">周公吐哺 文王以宁</h2>
                        <p data-caption-animate="fadeInUp" data-caption-delay="200">
                            <a href="mailto:tiaopcofficial@gmail.com" style=" color: black"> 邮件至 tiaopcofficial@gmail.com</a></p>
                                        

                    </div>
                </div>
            </div>
            {{-- s3 --}}
            <div class="swiper-slide" style="background-image: url({{ asset('assets/others/homepage/feedback.jpg')}});">
                <div class="container clearfix">
                    <div class="slider-caption slider-caption-center dark">
                        <h2 data-caption-animate="fadeInUp">This is our beta version. </h2>
                        <p data-caption-animate="fadeInUp" data-caption-delay="200">We hope to receive your feedback.</p>
                        <p data-caption-animate="fadeInUp" data-caption-delay="200">Please mail to tiaopcofficial@gmail.com without hesitation.</p>

                    </div>
                </div>
            </div>
        </div>
        <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
        <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
        <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
        <div class="swiper-pagination"></div>
    </div>


























    <script>
        jQuery(document).ready(function($){
            var swiperSlider = new Swiper('.swiper-parent',{
                paginationClickable: false,
                slidesPerView: 1,
                grabCursor: true,
                autoplay: 7000,
                speed: 650,
                loop: true,
                onSwiperCreated: function(swiper){
                    $('[data-caption-animate]').each(function(){
                        var $toAnimateElement = $(this);
                        var toAnimateDelay = $(this).attr('data-caption-delay');
                        var toAnimateDelayTime = 0;
                        if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
                        if( !$toAnimateElement.hasClass('animated') ) {
                            $toAnimateElement.addClass('not-animated');
                            var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                            setTimeout(function() {
                                $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                            }, toAnimateDelayTime);
                        }
                    });
                    SEMICOLON.slider.swiperSliderMenu();
                },
                onSlideChangeStart: function(swiper){
                    $('#slide-number-current').html(swiper.activeLoopIndex + 1);
                    $('[data-caption-animate]').each(function(){
                        var $toAnimateElement = $(this);
                        var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                        $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                    });
                    SEMICOLON.slider.swiperSliderMenu();
                },
                onSlideChangeEnd: function(swiper){
                    $('#slider').find('.swiper-slide').each(function(){
                        if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                        if($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                    });
                    $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function(){
                        if($(this).find('video').length > 0) {
                            if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
                        }
                        if($(this).find('.yt-bg-player').length > 0) {
                            $(this).find('.yt-bg-player').getPlayer().seekTo( $(this).find('.yt-bg-player').attr('data-start') );
                        }
                    });
                    if( $('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                    if( $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0 ) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                    $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
                        var $toAnimateElement = $(this);
                        var toAnimateDelay = $(this).attr('data-caption-delay');
                        var toAnimateDelayTime = 0;
                        if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
                        if( !$toAnimateElement.hasClass('animated') ) {
                            $toAnimateElement.addClass('not-animated');
                            var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                            setTimeout(function() {
                                $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
                            }, toAnimateDelayTime);
                        }
                    });
                }
            });

            $('#slider-arrow-left').on('click', function(e){
                e.preventDefault();
                swiperSlider.swipePrev();
            });

            $('#slider-arrow-right').on('click', function(e){
                e.preventDefault();
                swiperSlider.swipeNext();
            });

            $('#slide-number-current').html(swiperSlider.activeLoopIndex + 1);
            $('#slide-number-total').html($('#slider').find('.swiper-slide:not(.swiper-slide-duplicate)').length);
        });
    </script>

</section> 

@stop




{{-- Page Content --}}
@section('content')
	
<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap nobottompadding">

        <div class="fancy-title title-dotted-border title-center">
                    <h1>Our Featured Products</h1>
        </div>

        <div id="portfolio" class="portfolio-nomargin portfolio-full clearfix">

            <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/keyboard2.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
                    <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/xbox3601.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
           
                   <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/keyboard1.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
           
                   <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/xbox360.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
           
                   <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/kindle.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 6)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
           
                   <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/iphone.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 1)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
            <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/handset.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>            
             <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/speaker.png') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>          
             <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/ssd.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 12)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>          
            <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/pc.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 12)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
            <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/monitor.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>
            <article class="portfolio-item">
                <div class="portfolio-image">
                    <a href="portfolio-single.php">
                        <img src="{{ asset('assets/others/homepage/camera5.jpg') }}" alt="Open Imagination">
                    </a>
                    <div class="portfolio-overlay">
                        <a href="{{ route('item/category', 24)}}" class="center-icon" data-lightbox=""><i class="icon-line-plus"></i></a>
                    </div>
                </div>
            </article>


        </div>


    </div>


</section><!-- #content end -->

<script type="text/javascript">

                    jQuery(window).load(function(){

                        var $container = $('#portfolio');

                        $container.isotope({ transitionDuration: '0.65s' });

                        $('#portfolio-filter a').click(function(){
                            $('#portfolio-filter li').removeClass('activeFilter');
                            $(this).parent('li').addClass('activeFilter');
                            var selector = $(this).attr('data-filter');
                            $container.isotope({ filter: selector });
                            return false;
                        });

                        $('#portfolio-shuffle').click(function(){
                            $container.isotope('updateSortData').isotope({
                                sortBy: 'random'
                            });
                        });

                        $(window).resize(function() {
                            $container.isotope('layout');
                        });

                    });

</script>


@stop