@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Home page
@parent
@stop

@section('page-title')
@stop



@section('slider')

        <section id="slider" class="slider-parallax revoslider-wrap clearfix">

            <!--
            #################################
                - THEMEPUNCH BANNER -
            #################################
            -->
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>    <!-- SLIDE  -->
                    <li class="dark" data-transition="slideup" data-slotamount="1" data-masterspeed="1000" data-thumb="{{ asset('assets/others/homepage/v2/s1-thumb.jpg')}}"  data-fstransition="fade" data-fsmasterspeed="1000" data-fsslotamount="7" data-saveperformance="off"  data-title="Tiaopc v2.0">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('assets/others/homepage/v2/s1.jpg')}}"  alt="video_woman_cover3"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text"
                        data-x="0"
                        data-y="120"
                        data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-speed="800"
                        data-start="1200"
                        data-easing="easeOutQuad"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.1"
                        data-endspeed="1000"
                        data-endeasing="Power4.easeIn" style="z-index: 11; ">一键注册功能</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder uppercase"
                        data-x="-3"
                        data-y="140"
                        data-customin="x:5;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:5;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-speed="800"
                        data-start="1400"
                        data-easing="easeOutQuad"
                        data-splitin="chars"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="1000"
                        data-endeasing="Power4.easeIn" style="z-index: 11; font-size: 56px;">开放XJTLU邮箱注册</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                        data-x="0"
                        data-y="240"
                        data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-speed="800"
                        data-start="1600"
                        data-easing="easeOutQuad"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.1"
                        data-endspeed="1000"
                        data-endeasing="Power4.easeIn" style="z-index: 11; max-width: 550px; white-space: normal;">2.0 版本更新日志 &amp; 价格修改走势工具</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                        data-x="0"
                        data-y="345"
                        data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-speed="800"
                        data-start="1800"
                        data-easing="easeOutQuad"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.1"
                        data-endspeed="1300"
                        data-endeasing="Power4.easeIn" style="z-index: 11;"><a href="{{ route('about-us') }}" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Check Now</span> <i class="icon-angle-right"></i></a></div>

                    </li>
                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('assets/others/homepage/v2/s2-thumb.jpg')}}" data-delay="10000"  data-saveperformance="off"  data-title="Welcome">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('assets/others/homepage/v2/s2.jpg')}}"  alt="kenburns6"  data-bgposition="left top" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right bottom">
                    <!-- LAYERS -->

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                    data-x="0"
                    data-y="150"
                    data-customin="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-speed="800"
                    data-start="1500"
                    data-easing="easeOutQuad"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3; color: #FFFFFF;">    </div>

                    <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                    data-x="-3"
                    data-y="180"
                    data-customin="x:10;y:0;z:0;rotationY:120;rotationZ:0;scaleX:0.8;scaleY:0.8;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 50%;"
                    data-speed="600"
                    data-start="1700"
                    data-easing="easeOutCubic"
                    data-splitin="chars"
                    data-splitout="none"
                    data-elementdelay="0.1"
                    data-endelementdelay="0.1"
                    data-endspeed="1000"
                    data-endeasing="Power4.easeIn" style="z-index: 3; color: #000000; line-height: 1.2; max-width: 450px; width: 450px; white-space: normal;">花径不曾缘客扫 蓬门今始为君开</div>

                </li>
                </ul>

                </div>
            </div>

            <script type="text/javascript">

                var tpj=jQuery;
                tpj.noConflict();

                tpj(document).ready(function() {

                    var apiRevoSlider = tpj('.tp-banner').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:9000,
                        startwidth:1140,
                        startheight:700,
                        hideThumbs:200,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:3,

                        navigationType:"none",
                        navigationArrows:"nexttobullets",
                        navigationStyle:"preview4",

                        touchenabled:"on",
                        onHoverStop:"on",

                        swipe_velocity: 0.7,
                        swipe_min_touches: 1,
                        swipe_max_touches: 1,
                        drag_block_vertical: false,


                        parallax:"mouse",
                        parallaxBgFreeze:"on",
                        parallaxLevels:[8,7,6,5,4,3,2,1],
                        parallaxDisableOnMobile:"on",


                        keyboardNavigation:"on",

                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,

                        shadow:0,
                        fullWidth:"off",
                        fullScreen:"on",

                        spinner:"spinner0",

                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",


                        forceFullWidth:"off",
                        fullScreenAlignForce:"off",
                        minFullScreenHeight:"400",

                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        fullScreenOffsetContainer: ".header",
                        fullScreenOffset:"0px"
                    });

                    apiRevoSlider.bind("revolution.slide.onchange",function (e,data) {
                        if( $(window).width() > 992 ) {
                            if( $('#slider ul > li').eq(data.slideIndex-1).hasClass('dark') ){
                                $('#header.transparent-header:not(.sticky-header,.semi-transparent)').addClass('dark');
                                $('#header.transparent-header.sticky-header,#header.transparent-header.semi-transparent.sticky-header').removeClass('dark');
                                $('#header-wrap').removeClass('not-dark');
                            } else {
                                if( $('body').hasClass('dark') ) {
                                    $('#header.transparent-header:not(.semi-transparent)').removeClass('dark');
                                    $('#header.transparent-header:not(.sticky-header,.semi-transparent)').find('#header-wrap').addClass('not-dark');
                                } else {
                                    $('#header.transparent-header:not(.semi-transparent)').removeClass('dark');
                                    $('#header-wrap').removeClass('not-dark');
                                }
                            }
                            SEMICOLON.header.darkLogo();
                        }
                    });

                }); //ready

            </script>

            <!-- END REVOLUTION SLIDER -->

        </section>

@stop




{{-- Page Content --}}
@section('content')
    
<!-- Content
============================================= -->


</section><!-- #content end -->

<script type="text/javascript">


</script>


@stop
