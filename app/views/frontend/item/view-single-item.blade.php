@extends('frontend/layouts/default')

{{-- $item $pictures --}}
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54fc730c414be129" async="async"></script>


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
                            <div class="fslider" data-pagi="false" data-arrows="true" data-thumbs="false">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        @foreach ($pictures as $picture)

                                        <div class="slide"><a href={{asset("assets/new_img/$picture->picture_name")}} title="#" data-lightbox="gallery-item"><img src={{asset("assets/new_img/$picture->picture_name")}} alt="Pink Printed Dress"></a></div>
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- Product Single - Gallery End -->
                    </div>

                    <div class="col_two_fifth product-desc col_last">

                        <!-- Product Single - Price
                        ============================================= -->
                        <div class="product-price"><ins>{{ "£".$item->price }}</ins></div><!-- Product Single - Price End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Request Button
                        ============================================= -->   
                         <button id="request" class="button button-3d button-rounded nomargin"><i class="icon-ok"></i>Request</button>

                        <!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <div class="accordion accordion-bg clearfix">

                            <div class="acctitle acctitlec"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Description</div>
                            <div class="acc_content clearfix" style="display: block;">
                                {{ $item->description }}
                            </div>

                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Item Info</div>
                            <div class="acc_content clearfix" style="display: none;">
                        <!-- Product Single - Meta
                        ============================================= -->
                        <div class="panel panel-default product-meta">
                            <div class="panel-body">
                                <span itemprop="productID" class="sku_wrapper">ID: <span class="sku">{{$item->id}}</span></span>
                                <span class="posted_in">Category: <a href="#" rel="tag">{{$item->category_id}}</a>.</span>
                            </div>
                        </div><!-- Product Single - Meta End -->
                            </div>

                        </div>




                        <!-- Product Single - Share
                        ============================================= -->
                        <div class="si-share noborder clearfix">
                            <span>Share:</span>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_sharing_toolbox"></div>
                        </div><!-- Product Single - Share End -->

                    </div>



                </div>

            </div>
        </div>
    </div>
</section>


{{-- JQuery to handle ajax request --}}
<script type="text/javascript">
    

// Pre process the error msg    
$.ajaxSetup({
  error: function(xhr, status, error) {
    alert("An AJAX error occured: " + status + "\nError: " + error);
  }
});





// Get the item id
var itemID = {{ $item->id }};



$('#request').click(function(){

    var $button = $(this);

    $.get( '{{URL::route('request')}}', { itemID: itemID }, function(result){
        console.log(result);
        if(result == 1)
            alert("Please Sign in or Sign up.");
        if(result == 2)
            alert("You've already requested this item");
            $button.text('Requested');
            $button.attr( "disabled", "disabled" );
        if(result == 3)
        {
            alert('Success');
        }

    });
});






</script>





@stop