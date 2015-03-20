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
									<button class="button button-3d button-mini button-rounded button-red" data-toggle="modal" data-target="#myModal">Requests</button>
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

				@if ($item->status == 1)	
			<!--Modal View-->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			        <div class="modal-dialog">
			            <div class="modal-body">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                        <h4 class="modal-title" id="myModalLabel">Approve Reuqests</h4>
			                    </div>
			                    <div class="modal-body">
			                       <table class="table table-striped">
			                       	<thead>
			                       		<tr>
			                       			<th>Product ID</th>
			                       			<th>Product Name</th>
			                       			<th>Requested By</th>
			                       			<th>When</th>
			                       			<th>Action</th>
			                       		</tr>

			                       		<tbody>
			                       			<tr>
			                       				{{-- Product ID --}}
			                       				<td>ID</td>
			                       				{{-- Production Name --}}
			                       				<td>Name</td>
			                       				{{-- Requested By --}}
			                       				<td>Someone</td>
			                       				{{-- When --}}
			                       				<td>date</td>
			                       				{{-- Action --}}
			                       				<td><button class="button button-3d button-mini button-rounded button-green">Approve</button></td>
			                       			</tr>
			                       		</tbody>

			                       	</thead>
			                       </table>
			                    </div>
			                    <div class="modal-footer">
			                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			<!-- Modal View End -->
				@endif
				@endforeach
			</tbody>
		</table>

		{{$items->links() }}

		<div class="line"></div>	
{{-- 	</form> --}}
</section>


<!--Modal View-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Approve Reuqests</h4>
                    </div>
                    <div class="modal-body">
                       <table class="table table-striped">
                       	<thead>
                       		<tr>
                       			<th>Product ID</th>
                       			<th>Product Name</th>
                       			<th>Requested By</th>
                       			<th>When</th>
                       			<th>Action</th>
                       		</tr>

                       		<tbody>
                       			<tr>
                       				{{-- Product ID --}}
                       				<td>ID</td>
                       				{{-- Production Name --}}
                       				<td>Name</td>
                       				{{-- Requested By --}}
                       				<td>Someone</td>
                       				{{-- When --}}
                       				<td>date</td>
                       				{{-- Action --}}
                       				<td><button class="button button-3d button-mini button-rounded button-green">Approve</button></td>
                       			</tr>
                       		</tbody>

                       	</thead>
                       </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal View End -->











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