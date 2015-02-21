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
				<th>#</th>
				<th>Products</th>
				<th>Prices</th>
				<th>trade Status</th>
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
			This is body
			<tr>
				<td>1</td>
				<td>Product Image 1</td>
				<td>$14</td>
				<td>Sold</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Product Image 2</td>
				<td>$20</td>
				<td>Unsold</td>
			</tr>
		</tbody>
	</table>
	<div class="line"></div>



</form>
@stop