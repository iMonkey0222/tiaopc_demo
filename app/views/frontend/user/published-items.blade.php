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
<section id="account-content">

{{-- 	<form method="post" action="" class="form-horizontal" autocomplete="off"> --}}	
		<table class="table table-striped">
			<thead>
				<tr>
				{{-- 	<th>Tick</th> --}}
					<th>Products</th>
					<th>Price</th>
					
					<th>Trade Status</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($items as $item)
					@if($item->status == 0)

						<tr>		
{{-- 							<!-- Check box  -->
							<td>
								<div class="controls">
									<label class="control-label" for="select all">
										<input type = "checkbox" name="select all" id="select all" value = "Select All" /> 
									</label>
								</div>
							</td>
 --}}
							<!-- Product image and title --> 
							<td>
								<img width = "100" height="100" src = {{asset("assets/img/$item->picture")}} alt="查看宝贝详情" >
								<p>
									<a target = "_blank" hidefocus="true" title = "查看宝贝详情" href="{{ route('singleItem', $item->id) }}">
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
								<a id = "{{ $item->id }}" class="delete" ><i class="icon-remove"></i></a>
							</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>

		{{$items->links() }}

		<div class="line"></div>	
{{-- 	</form> --}}
</section>

{{-- JQuery to handle ajax request --}}
<script type="text/javascript">

// Pre process the error msg    
$.ajaxSetup({
  error: function(xhr, status, error) {
    alert("An AJAX error occured: " + status + "\nError: " + error);
  }
});


$('.delete').click(function(){
	
// // $(document).on('click', 'delete-{{ $item->id }}', function () {
	var $button = $(this);
	var theID = $button.attr('id');
	alert(theID);

	$.get('{{ URL::route('deleteItem', array('theID')) }}', { itemID: theID }, function(result){
		console.log(result);
		if(result == 1){
			alert("Please login first. ");
		}

		if(result == theID){
			alert("You are deleting product {{ $item->title }} "+theID);
			$button.closest('tr').remove();

		}

	});
	return false;
});




 // $(document).on('click', 'delete', function () {
 //     alert("aa");
 //     $(this).closest('tr').remove();
 //     return false;
 // });

</script>	

@stop