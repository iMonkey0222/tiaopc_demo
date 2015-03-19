
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
About Us
@parent
@stop


@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>About Us</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">Home</a></li>
            <li class="active icon-user">About Us</li>
        </ol>
    </div>

</section>
@stop

{{-- Page content --}}
@section('content')
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">


            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-screen i-alt"></i></a>
                    </div>
                    <h3>免费</h3>
                    <p>我们对所有注册用户完全免费。</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-eye i-alt"></i></a>
                    </div>
                    <h3>用户隐私</h3>
                    <p>我们竭尽我们所能保护用户的信息安全。</p>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="feature-box fbox-large fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-beaker i-alt"></i></a>
                    </div>
                    <h3>Powerful Performance</h3>
                    <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-stack i-alt"></i></a>
                    </div>
                    <h3>Premium Sliders</h3>
                    <p>Canvas included 20+ custom designed Slider Pages with Premium Sliders like Layer, Revolution, Swiper &amp; others.</p>
                </div>
            </div>
            <div class="col_one_third">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-thumbs-up i-alt"></i></a>
                    </div>
                    <h3>Unlimited Colors</h3>
                    <p>Change the color scheme of the Theme in a flash just by changing the 6-digit HEX code in the colors.php file.</p>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="feature-box fbox-large fbox-outline fbox-dark fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-text-width i-alt"></i></a>
                    </div>
                    <h3>Customizable Fonts</h3>
                    <p>Use any Font you like from Google Web Fonts, Typekit or other Web Fonts. They will blend in perfectly.</p>
                </div>
            </div>






            <h2>Feedback</h2>
            
          <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post" novalidate="novalidate">

                            <div class="form-process"></div>

                            <div class="col_half">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" aria-required="true">
                            </div>

                            <div class="col_half col_last">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control" aria-required="true">
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30" aria-required="true"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                            </div>

                            <div class="col_full">
                                <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                            </div>

                        </form>

            </div>

        </div>

    </div>

</section><!-- #content end -->
</section>
@stop
 


