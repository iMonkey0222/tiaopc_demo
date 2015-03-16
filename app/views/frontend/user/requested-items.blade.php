@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Requested Items
@parent
@stop

@section('account-page-title')
	<h3>My Profile</h3>
	<span><h4>My Requested Products</h4></span>
@stop



{{-- Publishment page content --}}
@section('account-content')
<section id="account-content">
<form method="post" action="" class="form-horizontal" autocomplete="off">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tick</th>
				<th>Image</th>
				<th>Title and seller info</th>
				<th>Price</th>
				<th>Trade Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($transactions as $transaction)
			<tr>
				<!-- Check box  -->
				<td>
					<div class="controls">
						<label class="control-label" for="select all">
							<input type = "checkbox" name="select all" id="select all" value = "Select All" /> 
						</label>
					</div>
				</td>

				<!-- Product image--> 
				<td>
					<p>
						<a target = "_blank" hidefocus="true" title = "查看宝贝详情" href="{{ URL::route('singleItem',array($transaction->item_id)) }}">
							<img width = "100" height="100" src = {{asset("assets/img/$transaction->item_picture")}} alt="查看宝贝详情" >
						</a>
					</p>	
				</td>

				<!-- Product title and seller id--> 
				<td>
					<p>
						<a target = "_blank" hidefocus="true" title = "查看宝贝详情" href="{{ URL::route('singleItem',array($transaction->item_id)) }} ">
							{{ $transaction->item_title }}
						</a>
						<a>{{ $transaction->seller_id }} </a>
					</p>	
				</td>

				<!-- Product price --> 
				<td>
					£{{ $transaction->item_price }}
				</td>


				<!-- Product Order_status/Transaction Status --> 
				<td>
					@if ($transaction->status == 1)
						<p>Requested</p>
					@elseif ($transaction->status == 2)
						<p>Paid</p>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="line"></div>

</form>
</section>

@foreach ($transactions as $transaction)
{{-- now the result is $transaction->item is a string !! not an array --}}
{{ $transaction->item_id }} 
{{ $transaction->seller_id }} 
{{ $transaction->item_title }} 
{{ $transaction->item_price }} 
{{ $transaction->item_picture }} 
{{ $transaction->status }} 
{{ $transaction->created_at }} 
<br>
@endforeach



@stop

