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

{{-- zheshi  --}}

{{-- Publishment page content --}}
@section('account-content')
<section id="account-content">

	<table class="table table-striped">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Price</th>
				<th>Trade Status</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($transactions as $transaction)
			<tr>
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
					</p>	
				</td>

				<!-- Product price --> 
				<td>
					£{{ $transaction->item_price }}
				</td>

				<!-- Product Order_status/Transaction Status --> 
				<td>
					@if ($transaction->status == 0)
						<p></p>
					@elseif ($transaction->status == 1)
						<p>Being Requested</p>
					@elseif ($transaction->status == 2)
						<p>Paid</p>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


	<div class="line"></div>

	{{$transactions->links()}} {{-- the page number --}}


</section>
@stop

