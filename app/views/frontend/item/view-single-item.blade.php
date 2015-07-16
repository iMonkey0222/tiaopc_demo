@extends('frontend/layouts/default')


{{-- {{ "Triggle code is ".$triggleCode;}} --}}

{{-- $item $pictures --}}
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54fc730c414be129" async="async"></script>


{{-- Page title --}}
@section('title')
{{$item->title}} |
@parent
@stop



{{-- Body Title --}}
@section('page-title')

<section id="page-title">

    <div class="container clearfix">
        <h1>{{ $item->title }}</h1>
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

                                        <div class="slide"><a href={{asset("assets/new_img/$picture->picture_name")}} title="#" data-lightbox="gallery-item"><img src={{cdn("assets/new_img/$picture->picture_name")}} alt="Pink Printed Dress"></a></div>
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- Product Single - Gallery End -->
                    </div>

                    <div class="col_two_fifth product-desc col_last">

                        <!-- Product Single - Price
                        ============================================= -->
                        @if($item->location == 1 || $item->location == 0)
                            <div class="product-price"><ins>{{ "£".$item->price }}</ins></div><!-- Product Single - Price End -->
                        @elseif($item->location == 2)
                            <div class="product-price"><ins>{{ "￥".$item->price }}</ins></div><!-- Product Single - Price End -->
                        @endif

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Request Button
                        ============================================= --> 
                        @if( $triggleCode != 2 && $triggleCode !=4 )
                         <button id="request" class="button button-3d button-rounded nomargin"><i class="icon-ok"></i>发送请求</button>
                        @elseif( $triggleCode == 4 )
                         <button id="requested" class="button button-3d button-rounded nomargin"><i class="icon-ok"></i>已请求</button>
                        @endif
                        <!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <div class="accordion accordion-bg clearfix">
                            
                            {{-- Description --}}
                            <div class="acctitle acctitlec"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>卖家描述</div>
                            <div class="acc_content clearfix" style="display: block;">
                                {{ $item->description }}
                            </div>
                            {{-- Item Info eg. Category --}}
                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>产品信息</div>
                            <div class="acc_content clearfix" style="display: none;">
                                <!-- Product Single - Meta
                                ============================================= -->
                                <div class="panel panel-default product-meta">
                                    <div class="panel-body">
                                        <span itemprop="productID" class="sku_wrapper">编号: <span class="sku">{{$item->id}}</span></span>
                                     {{--     <span class="posted_in">分类: <a href="#" rel="tag">{{$item->parent_category_name}}.{{$item->category_name}}</a>.</span> --}}
                                        <span class="posted_in">分类: <a href="#" rel="tag">{{$item->category_name}}</a>.</span>
                                        <span>新旧程度: {{ $item->product_condition }}成新</span>
                                        
                                        <span>物品所在地: {{ ($item->location == 1 || $item->location == 0) ? '英国 利物浦' : '中国 苏州' }}</span>
                                        <span>创建于: {{ $item->created_at }}</span>
                                    </div>
                                </div><!-- Product Single - Meta End -->
                            </div>

                            {{-- Description --}}
                            <div class="acctitle acctitlec"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>价格走势</div>
                            <div id="priceTrend" class="acc_content clearfix" style="display: block;">
                                <div id="lineChart" style="opacity: 0;">
                                    <canvas id="lineChartCanvas" width="400" height="200" ></canvas>
                                </div>
                            </div>


                            @if( $triggleCode == 2) 
                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>卖家信息</div>
                            <div class="acc_content clearfix" style="display: block;">
                                <div>姓名: <strong>{{ $seller->nickname }}</strong></div>
                                <div>Email: <strong>{{ $seller->email }}</strong></div>
                                <div>联系电话: <strong>{{ $seller->phone_no }}</strong></div>
                                @if($seller->weixin)
                                    <div>微信: <strong>{{ $seller->weixin }}</strong></div>
                                @endif
                                @if($seller->qq)
                                    <div>QQ: <strong>{{ $seller->qq }}</strong></div>
                                @endif
                            </div>
                            @endif    
                        </div>




                        <!-- Product Single - Share
                        ============================================= -->
                        <div class="si-share noborder clearfix">
                            <span>分享至:</span>
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
    

jQuery(window).load( function(){

        var itemId = {{$item->id}};


        $.get('{{ URL::route('getPrice')}}', {item_id: itemId}, function(result){

            console.log(result.length);
            priceArray = new Array();
            timeArray = new Array();

            if(result.length <=1)
            {
            $('#lineChart').remove();
            $('#priceTrend').append('<h5> 价格目前未发生变动</h5>');
            }else{

  
                $.each(result, function(index, price){
                priceArray.push(price.price);
                timeArray.push(price.created_at);
                console.log(priceArray);

            });

            }



        var lineChartData = {
                                labels :timeArray,
                                datasets : [

                                    {
                                        fillColor : "rgba(151,187,205,0.5)",
                                        strokeColor : "rgba(151,187,205,1)",
                                        pointColor : "rgba(151,187,205,1)",
                                        pointStrokeColor : "#fff",
                                        data: priceArray
                                    },

                                ]};

                            var globalGraphSettings = {animation : Modernizr.canvas};

                            function showLineChart(){
                                var ctx = document.getElementById("lineChartCanvas").getContext("2d");
                                new Chart(ctx).Line(lineChartData,globalGraphSettings);
                            }

              $('#lineChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showLineChart,300); },{accX: 0, accY: -155},'easeInCubic');

        });





      });












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
        {
            alert("Please Sign in or Sign up.");
        }
        if(result == 2)
        {
            alert("You've already requested this item");
            $button.text('已请求');
            $button.attr( "disabled", "disabled" );
        }
        if(result == 3)
        {
            alert('Success');
            $button.text('已请求');
            $button.attr( "disabled", "disabled" );
        }

        if(result == 4)
        {
            alert('You cannot request your own item.')
        }

        if(result == 5){
            // Display an alert
            var respond = confirm("TiaoPC 友情提示: "+"\n\n"+ 
                "为了交易的信息公平性" +"\n\n"+
                "请您先完善您的个人资料，否则将无法请求该商品。" +"\n\n\n"+ 
                "点击OK确认继续， 点击Cancel取消");
            // Route to profile page
            if(respond == true)
            {
                window.location.href = "{{ route('profile') }}";
            }
        }
    });
});






</script>





@stop