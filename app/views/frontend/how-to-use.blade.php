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
                                <h5>Review Cart</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>Enter Shipping Info</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>Complete Payment</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>Order Complete</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ipsa, fuga, modi, corporis maiores illum fugit ratione cumque dolores sint obcaecati quod temporibus. Expedita, sapiente, veritatis, impedit iusto labore sed itaque sunt fugiat non quis nihil hic quos necessitatibus officiis mollitia nesciunt neque! Minus, mollitia at iusto unde voluptate repudiandae.</p>

                                <div class="table-responsive">

                                    <table class="table cart">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-remove">&nbsp;</th>
                                                <th class="cart-product-thumbnail">&nbsp;</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-price">Unit Price</th>
                                                <th class="cart-product-quantity">Quantity</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="cart-product-remove">
                                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                                </td>

                                                <td class="cart-product-thumbnail">
                                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/dress-3.jpg" alt="Pink Printed Dress"></a>
                                                </td>

                                                <td class="cart-product-name">
                                                    <a href="#">Pink Printed Dress</a>
                                                </td>

                                                <td class="cart-product-price">
                                                    <span class="amount">$19.99</span>
                                                </td>

                                                <td class="cart-product-quantity">
                                                    <div class="quantity clearfix">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>

                                                <td class="cart-product-subtotal">
                                                    <span class="amount">$19.99</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-remove">
                                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                                </td>

                                                <td class="cart-product-thumbnail">
                                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/shoes-2.jpg" alt="Checked Canvas Shoes"></a>
                                                </td>

                                                <td class="cart-product-name">
                                                    <a href="#">Checked Canvas Shoes</a>
                                                </td>

                                                <td class="cart-product-price">
                                                    <span class="amount">$24.99</span>
                                                </td>

                                                <td class="cart-product-quantity">
                                                    <div class="quantity clearfix">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>

                                                <td class="cart-product-subtotal">
                                                    <span class="amount">$24.99</span>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </div>

                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="2">Checkout ⇒</a>

                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, deleniti, atque soluta ratione blanditiis maxime at architecto laudantium eius eaque distinctio dolorem voluptatem nam ab molestias velit nemo. Illo, hic.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, modi, odit, aspernatur veritatis ipsum molestiae impedit iusto blanditiis voluptatem ab voluptas ullam expedita repellendus porro assumenda non deserunt repellat eius rem dolorem corporis temporibus voluptatibus ut! Quod, corporis, tempora, dolore, sint earum minus deserunt eveniet natus error magnam aliquam nemo.</p>
                                <div class="line"></div>
                                <a href="#" class="button button-3d nomargin tab-linker" rel="1">Previous</a>
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="3">Pay Now</a>
                            </div>
                            <div id="ptab3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sit, culpa, placeat, tempora quibusdam molestiae cupiditate atque tempore nemo tenetur facere voluptates autem aliquid provident distinctio beatae odio maxime pariatur eos ratione quae itaque quod. Distinctio, temporibus, cupiditate, eaque vero illo molestiae vel doloremque dolorum repellat ullam possimus modi dicta eum debitis ratione est in sunt et corrupti adipisci quibusdam praesentium optio laborum tempora ipsam aut cum consectetur veritatis dolorem.</p>
                                <div class="line"></div>
                                <a href="#" class="button button-3d nomargin tab-linker" rel="2">Previous</a>
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="4">Complete Order</a>
                            </div>
                            <div id="ptab4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="alert alert-success">
                                    <strong>Thank You.</strong> Your order will be processed once we verify the Payment.
                                </div>
                            </div>
                        </div>
                    </div>

			<div class="clear"></div>
			<div class="line"></div>

			<div class="fancy-title title-dotted-border title-center">
                        <h2><span>For Seller</span></h2>
            </div>

			<div id="processTabs2" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                        <ul class="process-steps bottommargin clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="ptab1" aria-labelledby="ui-id-1" aria-selected="true">
                                <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">1</a>
                                <h5>Review Cart</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab2" aria-labelledby="ui-id-2" aria-selected="false">
                                <a href="#ptab2" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">2</a>
                                <h5>Enter Shipping Info</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab3" aria-labelledby="ui-id-3" aria-selected="false">
                                <a href="#ptab3" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">3</a>
                                <h5>Complete Payment</h5>
                            </li>
                            <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="ptab4" aria-labelledby="ui-id-4" aria-selected="false">
                                <a href="#ptab4" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4">4</a>
                                <h5>Order Complete</h5>
                            </li>
                        </ul>
                        <div>
                            <div id="ptab1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ipsa, fuga, modi, corporis maiores illum fugit ratione cumque dolores sint obcaecati quod temporibus. Expedita, sapiente, veritatis, impedit iusto labore sed itaque sunt fugiat non quis nihil hic quos necessitatibus officiis mollitia nesciunt neque! Minus, mollitia at iusto unde voluptate repudiandae.</p>

                                <div class="table-responsive">

                                    <table class="table cart">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-remove">&nbsp;</th>
                                                <th class="cart-product-thumbnail">&nbsp;</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-price">Unit Price</th>
                                                <th class="cart-product-quantity">Quantity</th>
                                                <th class="cart-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="cart-product-remove">
                                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                                </td>

                                                <td class="cart-product-thumbnail">
                                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/dress-3.jpg" alt="Pink Printed Dress"></a>
                                                </td>

                                                <td class="cart-product-name">
                                                    <a href="#">Pink Printed Dress</a>
                                                </td>

                                                <td class="cart-product-price">
                                                    <span class="amount">$19.99</span>
                                                </td>

                                                <td class="cart-product-quantity">
                                                    <div class="quantity clearfix">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>

                                                <td class="cart-product-subtotal">
                                                    <span class="amount">$19.99</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-remove">
                                                    <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                                                </td>

                                                <td class="cart-product-thumbnail">
                                                    <a href="#"><img width="64" height="64" src="images/shop/thumbs/small/shoes-2.jpg" alt="Checked Canvas Shoes"></a>
                                                </td>

                                                <td class="cart-product-name">
                                                    <a href="#">Checked Canvas Shoes</a>
                                                </td>

                                                <td class="cart-product-price">
                                                    <span class="amount">$24.99</span>
                                                </td>

                                                <td class="cart-product-quantity">
                                                    <div class="quantity clearfix">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>

                                                <td class="cart-product-subtotal">
                                                    <span class="amount">$24.99</span>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </div>

                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="2">Checkout ⇒</a>

                            </div>
                            <div id="ptab2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, deleniti, atque soluta ratione blanditiis maxime at architecto laudantium eius eaque distinctio dolorem voluptatem nam ab molestias velit nemo. Illo, hic.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, modi, odit, aspernatur veritatis ipsum molestiae impedit iusto blanditiis voluptatem ab voluptas ullam expedita repellendus porro assumenda non deserunt repellat eius rem dolorem corporis temporibus voluptatibus ut! Quod, corporis, tempora, dolore, sint earum minus deserunt eveniet natus error magnam aliquam nemo.</p>
                                <div class="line"></div>
                                <a href="#" class="button button-3d nomargin tab-linker" rel="1">Previous</a>
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="3">Pay Now</a>
                            </div>
                            <div id="ptab3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, sit, culpa, placeat, tempora quibusdam molestiae cupiditate atque tempore nemo tenetur facere voluptates autem aliquid provident distinctio beatae odio maxime pariatur eos ratione quae itaque quod. Distinctio, temporibus, cupiditate, eaque vero illo molestiae vel doloremque dolorum repellat ullam possimus modi dicta eum debitis ratione est in sunt et corrupti adipisci quibusdam praesentium optio laborum tempora ipsam aut cum consectetur veritatis dolorem.</p>
                                <div class="line"></div>
                                <a href="#" class="button button-3d nomargin tab-linker" rel="2">Previous</a>
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="4">Complete Order</a>
                            </div>
                            <div id="ptab4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                <div class="alert alert-success">
                                    <strong>Thank You.</strong> Your order will be processed once we verify the Payment.
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