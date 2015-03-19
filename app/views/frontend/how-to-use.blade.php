@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
How to use
@parent
@stop



@section('page-title')

<section id="page-title">

    <div class="container clearfix">
        <h3>How to Use</h3>
        <span>Step by Step Instruction</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">How to use</li>
        </ol>
    </div>

</section>

@stop





{{-- Page Content --}}
@section('content')
<section id="content">
<div class="content-wrap">
<div class="container clearfix">
            
            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>For Buyer</span></h2>
            </div>
            

            <div id="processTabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                        <ul class="process-steps bottommargin clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="ptab1" aria-labelledby="ui-id-1" aria-selected="true">
                                <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">1</a>
                                <h5>查看</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>请求</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>联系</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>交易</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                                <p>
                                买家可以从首页hompage进入热门产品类，或者点击导航栏右上方“item”选择分类或者更具体的子分类进入多个产品界面。商品信息默认按照时间排序，买家可以自行选择价格高低排序；从而选定中意的产品点击预览图放大或者进入单个产品信息。
                                </p>

                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>
                                当买家选中单个产品后，页面右侧会有1.Request按钮2.商品描述3.商品ID与新旧度。买家可以根据商品描述与新旧度决定Request与否。
                                </p>
                                <p>
                                如果点击Request，商品的卖家将会收到request请求。当买家request此产品后，可以在my profile查看已经request的产品列表信息，以便再次登陆时快速访问。
                                </p>
                            </div>
                            <div id="ptab3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>
                                当卖家同意买家的request后，那么此单个产品页面右侧第三栏处将会显示出卖家的联系方式（姓名，邮箱，电话等），买家可以自行选择一种或多种方式与卖家私下联系决定交易具体的时间与地点，并可以就商品的详情做进一步地了解，或者与卖家重新协定商品的价格，达成一致。
                                </p>
                            </div>
                            <div id="ptab4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>
                                卖家同意出售产品后，买家与卖家在约定的时间与地点碰面，在买家确认商品的详情后，自行选择现金或者转账等多种方式支付此商品，完成交易。
                                </p>
                            </div>
                        </div>
                    </div>

            <div class="clear"></div>
            <div class="line"></div>

            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>For Seller</span></h2>
            </div>

            <div id="processTabs2" class="ui-tabs ui-widget ui-widget-content ui-corner-all ">
                        <ul class="process-steps bottommargin clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all  " role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="ptab1" aria-labelledby="ui-id-1" aria-selected="true">
                                <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">1</a>
                                <h5>发布</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>接受请求</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>联系</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>交易</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                                <p>当卖家打算出售闲置产品时，点击导航栏右上方”publish ”跳转至商品发布页面。卖家首先确定产品的Title(比如:联想Y50 高分屏)，出售价格（单位为英镑），并且选择产品对应的多级分类（电脑-笔记本-游戏本），根据产品的使用情况选择相对应的新旧程度；接着在第一个图片上传链接上传商品的主图（会显示在首页或者多个商品页面），然后在第二个上传链接处上传最多10张图片。当所有内容填写完成后，点击publish提交商品。</p>


                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>
                                当卖家发布产品后，可以在my profile中找到已发布的产品用于之后修改图片信息与价格，者删除已发布的商品。在my published product这一选项内，卖家可以收到来自买家的request请求，卖家了自行决定接受或者不接受这些请求。若接受请求，则买家将获取卖家提供的个人联系方式(手机，邮箱)。
                                </p>

                            </div>
                        </div>
            </div>

             
        </div>
</div>
</section>

<script>
  $(function() {
    $( "#processTabs" ).tabs({ show: { effect: "fade", duration: 400 } });
    $( ".tab-linker" ).click(function() {
        $( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
        return false;
    });
  });
  	 $(function() {
    $( "#processTabs2" ).tabs({ show: { effect: "fade", duration: 400 } });
    $( ".tab-linker" ).click(function() {
        $( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
        return false;
    });
  });

</script>




@stop