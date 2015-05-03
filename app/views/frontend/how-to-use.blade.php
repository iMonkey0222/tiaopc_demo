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
                        <h2><span>买家须知</span></h2>
            </div>
            

            <div id="processTabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                        <ul class="process-steps bottommargin clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="ptab1" aria-labelledby="ui-id-1" aria-selected="true">
                                <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">1</a>
                                <h5>选择商品</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>提交请求</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>联系卖家</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>进行交易</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                                <div class="col-md-1 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    
                                    <p>
                                        点击导航栏右上方电子产品选择地点(或进一步选择商品分类)进入多个产品界面。
                                    </p>
                                    <p>
                                        产品会自动按照上传时间排序（由新到旧），您也可以自行选择价格高低排序；从而选定中意的产品点击预览图放大或者进入单个产品信息。
                                    </p>

                                </div>
                                

                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-2 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    <p>
                                        当您选中单个产品后，页面右侧会有1.发送请求按钮2.卖家描述3.产品信息。
                                    </p>
                                    <p>
                                        您可以根据卖家描述与产品信息决定发送请求与否。 
                                    </p>
                                    <p>
                                        如果点击“发送请求”，商品的卖家将会收到请求。
                                    </p>
                                    <p>
                                        当您成功发送请求后，可以在我的账户查看“我请求的电子产品”列表信息，以便再次登陆时快速访问。
                                    </p>
                                </div>

                            </div>
                            <div id="ptab3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-5 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    <p>
                                        当卖家同意买家的请求后，您的登陆邮箱会收到卖家接受请求的推送邮件。
                                    </p>
                                    <p>
                                        当您再次登陆时，对应产品页面会显示出卖家的联系方式（姓名，邮箱，电话等）。
                                    </p>
                                    <p>
                                        您可以自行选择一种或多种方式与卖家私下联系决定交易具体的时间与地点，并可以就商品的详情做进一步地了解，或者与卖家重新协定商品的价格，达成一致。
                                    </p>
                                </div>
                            </div>
                            <div id="ptab4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-7 nobottommargin"></div>
                                <div class="col-md-4 col_last nobottommargin">
                                    <p>
                                        卖家同意出售产品后，您可以与卖家在约定的时间与地点碰面，在您确认商品的详情后，自行选择现金或者转账等多种方式支付此商品，完成交易。
                                    </p> 
                                </div>
                                <div class="col-md-1 col_last nobottommargin"></div>
                            </div>
                        </div>
                    </div>

            <div class="clear"></div>
            <div class="line"></div>

            <div class="fancy-title title-dotted-border title-center">
                        <h2><span>卖家须知</span></h2>
            </div>

            <div id="processTabs2" class="ui-tabs ui-widget ui-widget-content ui-corner-all ">
                        <ul class="process-steps bottommargin clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all  " role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="ptab1" aria-labelledby="ui-id-1" aria-selected="true">
                                <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">1</a>
                                <h5>发布商品</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>接受请求</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>联系买家</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>进行交易</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
                            <div class="col-md-1 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    <p>
                                        当您打算出售闲置产品时，点击导航栏右上方“发布产品”跳转至商品发布页面。
                                    </p>
                                    <p>
                                        您首先确定产品的标题(比如: 联想Y50高分屏) ，接着选择产品所在地，出售价格（货币单位根据地点自动变化），并且选择产品对应的分类与新旧程度。
                                    </p>
                                    <p>
                                        接着在第一个上传链接处上传商品的主图，在第三个上传链接处上传最少1张，至多10张图片（建议每张图片大小小于1MB），最后在“产品描述”一栏中添加自己对于产品的细节描述。
                                    </p>
                                </div>
                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-2 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    <p>
                                        当您发布产品后，可以在我的账户中“我发布的电子产品”找到已发布的产品。
                                    </p>
                                    <p>
                                        如果您对于发布的产品信息不满意，可在此处直接编辑产品信息。
                                    </p>
                                    <p>
                                        在“我发布的电子产品”这一选项内，同时您可以查看来自买家对商品的请求，以及买家信息与请求时间。  
                                    </p>
                                    <p>
                                        当您决定接受其中一个请求时，点击ACCEPT按钮同意买家的请求，成功接受后，按钮将变为APPROVED。
                                    </p>
                                </div>
                                
                            </div>
                        
                            <div id="ptab3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-5 nobottommargin"></div>
                                <div class="col-md-5 col_last nobottommargin">
                                    <p>
                                        当您同意买家的请求后，那么买家会看到您留下的联系方式（用户名，邮箱，电话等）。
                                    </p>
                                    <p>
                                        买家会自行选择一种或多种方式与您进行私下联系决定交易具体的时间与地点，并可以就商品的详情做进一步地了解，或者与您重新协定商品的价格，达成一致。
                                    </p>
                                </div>
                                
                            </div>
                            <div id="ptab4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="col-md-7 nobottommargin"></div>
                                <div class="col-md-4 col_last nobottommargin">
                                    <p>
                                        若买家同意购买您发布的商品，您可与买家在约定的时间与地点碰面，在买家确认商品的详情，并和您达成一致后，自行选择现金或者转账等多种方式支付此商品，完成交易。
                                    </p>
                                    <p>
                                        当交易完成后，您可以在“我发布的电子产品”中，选择该买家，点击MAKE A DEAL修改该交易产品的状态为已发布。
                                    </p>
                                </div>
                                
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