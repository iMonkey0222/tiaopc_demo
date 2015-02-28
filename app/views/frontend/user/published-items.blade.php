@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Published Items
@stop

{{-- Publishment page content --}}
@section('account-content')
<div class="page-header">
	<h4>My Published Products</h4>
</div>


<form method="post" action="" class="form-horizontal" autocomplete="off">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Products</th>
				<th>Price</th>
				<th>Trade Status</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<tr>
				<td colspan="7">

					<div class="controls">
						<label class="control-label" for="select all">
							<input type = "checkbox" name="select all" id="select all" value = "Select All" /> 
						</label>
					</div>
				</td>
			</tr>
		</thead>

		<tbody>
			@foreach ($items as $item)
			<tr>
				<td>{{ $item-> title }}</td>
				<td>
					<a target = "_blank" hidefocus="true" title = "查看宝贝详情" href="http://www.baidu.com"><img alt="查看宝贝详情" src = "data:image/jpeg;base64,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">
					</a>
					<p>Product Image 1</p>	
				</td>
				<td>£{{ $item-> price }}</td>
				<td>{{ $item-> product_condition }} </td>
				<td>{{ $item-> order_status }}</td>
				<td>
					<a class="btn" href="{{ route('editSingleItem') }}">Edit Item</a>
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
@endforeach



@stop