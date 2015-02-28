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
                        <p>This is for text description</p>


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