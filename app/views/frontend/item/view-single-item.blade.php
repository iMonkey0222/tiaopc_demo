@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Single item page
@parent
@stop


@section('page-title')

<section id="page-title">

    <div class="container clearfix">
        <h1>Single Item Page</h1>
    </div>

</section>

@stop




{{-- Page Content --}}
@section('content')


<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">    
            <div class="single-product">

                <div class="product">
    				

                    <div class="col_three_fifth">

                        <!-- Product Single - Gallery
                        ============================================= -->
                        <div class="product-image">
                            <div class="fslider" data-pagi="false" data-arrows="true" data-thumbs="false" >
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        @foreach ($pictures as $picture)
                                        <div class="slide" data-thumb="images/shop/thumbs/dress/3.jpg"><a href="images/shop/dress/3.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src={{asset("assets/img/$picture->picture_name")}} alt="Pink Printed Dress"></a></div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div><!-- Product Single - Gallery End -->

                    </div>

                    <div class="col_two_fifth product-desc col_last">

                        <!-- Product Single - Price
                        ============================================= -->
                        <div class="product-price"><ins>£24.99</ins></div><!-- Product Single - Price End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Quantity & Cart Button
                        ============================================= -->
                        <form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                            <button type="submit" class="button nomargin">Request</button>
                        </form><!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero velit id eaque ex quae laboriosam nulla optio doloribus! Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>
                        <p>Perspiciatis ad eveniet ea quasi debitis quos laborum eum reprehenderit eaque explicabo assumenda rem modi.</p>


                        <!-- Product Single - Meta
                        ============================================= -->
                        <div class="panel panel-default product-meta">
                            <div class="panel-body">
                                <span itemprop="productID" class="sku_wrapper">ID: <span class="sku">8465415</span></span>
                                <span class="posted_in">Category: <a href="#" rel="tag">Dress</a>.</span>
                                <span class="tagged_as">Tags: <a href="#" rel="tag">Pink</a>, <a href="#" rel="tag">Short</a>, <a href="#" rel="tag">Dress</a>, <a href="#" rel="tag">Printed</a>.</span>
                            </div>
                        </div><!-- Product Single - Meta End -->

                        <!-- Product Single - Share
                        ============================================= -->
                        <div class="si-share noborder clearfix">
                            <span>Share:</span>
                            <div>
                                <a href="#" class="social-icon si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-rss">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-email3">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                            </div>
                        </div><!-- Product Single - Share End -->

                    </div>

                    <div class="col_full nobottommargin">

                        <div class="tabs clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tab-3">

                            <ul class="tab-nav tab-nav2 clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-9" aria-labelledby="ui-id-9" aria-selected="false"><a href="#tabs-9" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-9"><i class="icon-home2 norightmargin"></i></a></li>
                                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-10" aria-labelledby="ui-id-10" aria-selected="false"><a href="#tabs-10" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-10">Nunc tincidunt</a></li>
                                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-11" aria-labelledby="ui-id-11" aria-selected="true"><a href="#tabs-11" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-11">Proin dolor</a></li>
                                <li class="hidden-phone ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-12" aria-labelledby="ui-id-12" aria-selected="false"><a href="#tabs-12" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-12">Aenean lacinia</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-9" aria-labelledby="ui-id-9" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                    Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.
                                </div>
                                <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-10" aria-labelledby="ui-id-10" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                    Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.
                                </div>
                                <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-11" aria-labelledby="ui-id-11" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                                    Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.
                                </div>
                                <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-12" aria-labelledby="ui-id-12" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                    Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.
                                </div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>
        </div>
    </div>
</section>




<div class="clear"></div>
<div class="line"></div>







{{ $item }}

{{ $pictures }}

@foreach ($pictures as $picture)

{{ HTML::image('/assets/img/'.($picture->picture_name)) }}

<br>

@endforeach

@stop