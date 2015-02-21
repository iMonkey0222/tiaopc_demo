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
	<table>
		<thead>
			<tr>
				<th>Products</th>
				<th>Prices</th>
				<th>trade Status</th>
			</tr>
			<tr><td colspan="9">this is step row</td></tr>
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
			<tr><td colspan="7"></td></tr>
		</tbody>
	</table>


</form>
@stop