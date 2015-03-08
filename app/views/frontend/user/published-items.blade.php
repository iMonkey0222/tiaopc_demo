@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Published Items
@stop

@section('account-page-title')
    <h3>My Profile</h3>
    <span><h4>My Published Products</h4></span>
@stop


{{-- Publishment page content --}}
@section('account-content')

<form method="post" action="" class="form-horizontal" autocomplete="off">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tick</th>
				<th>Products</th>
				<th>Price</th>
				
				<th>Status</th>
				<th>Trade Status</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($items as $item)
			<tr>
				<!-- Check box  -->
				<td>
					<div class="controls">
						<label class="control-label" for="select all">
							<input type = "checkbox" name="select all" id="select all" value = "Select All" /> 
						</label>
					</div>
				</td>

				<!-- Product image and title --> 
				<td>
					<img width = "100" height="100" src = {{asset("assets/img/$item->picture")}} alt="查看宝贝详情" >
					<p>
						<a target = "_blank" hidefocus="true" title = "查看宝贝详情" href="http://localhost:8888/tiaopc_demo/public/item/{{ $item->id }}">
							{{ $item->title }}
						</a>
					</p>	
				</td>

				<!-- Product price --> 
				<td>
					@if (!empty($item-> price))
					£{{ $item-> price }}
					@endif
				</td>

				<!-- Product Status --> 
				<td>
					@if ($item-> status == 0)
						<p>Frozen</p>
					@elseif ($item-> status == 1)
						<p>Active</p>

					@endif
				</td>

				<!-- Product Order_status/Transaction Status --> 
				<td>
					@if ($item-> order_status == 0)
						<p>0 Request</p>
					@elseif ($item-> status == 1)
						<p>Requested</p>
					@elseif ($item-> status == 2)
						<p>Sold</p>
					@endif
					<!-- {{ $item-> order_status }} -->
				</td>
				<td>
					<a class="btn" href="{{ URL::route('reviseSingleItem',array($item->id)) }}">Edit Item</a>
					<a class="btn" href="{{ URL::route('deleteItem',array($item->id)) }}">Delete Item</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="line"></div>



</form>


@foreach ($items as $item)
{{ $item-> title }}
{{ $item-> product_condition }} 
{{ $item-> order_status }}
{{ $item-> status }}
{{ $item-> price }}
{{ $item-> picture}}
@endforeach



@stop