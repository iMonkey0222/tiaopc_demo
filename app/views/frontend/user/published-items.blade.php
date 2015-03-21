
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
				<th>Products</th>
				<th>Title</th>
				<th>Price</th>
				
				<th>Trade Status</th>
				<th>Response</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($items as $item)
			<!-- Item is active -->
				@if($item->status == 0)
					<tr>		
 						<!-- Product image --> 
						<td>
							<img width = "100" height="100" src = {{asset("assets/img/$item->picture")}} alt="查看宝贝详情" >	
						</td>

						<!-- Product title --> 
						<td>
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
							@elseif ($item-> order_status == 1)
								<p>Requested</p>
							@elseif ($item-> order_status == 2)
								<p>Sold</p>
							@endif
							<!-- {{ $item-> order_status }} -->
						</td>

						<!-- Check requests-->	
						<td>
							<!-- Item has at least one request or user has approved -->	
							@if($item->order_status == 1)
								
								<a href="{{ URL::route('showRequest',array($item->id))  }}" class="btn btn-primary button-mini"value = "{{$item->id}}" >Check Requests</a>
{{-- 								data-target="#myModal"
 --}}
<<<<<<< HEAD
 {{-- <a href="{{ URL::route('showRequest', array($item->id)) }}" class="btn btn-primary button-mini" data-toggle="modal" value = "{{$item->id}}" >Check Requests</a> --}}
							@endif
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

		{{$items->links() }} {{-- the page number --}}
=======
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
>>>>>>> 6bb7e9484a70092f88abce72e894625a29616b4e

		<div class="line"></div>	
{{-- 	</form> --}}

{{-- Modal display when click check button--}}
 <div id="ajax-modal" class="modal hide fade" tabindex="-1"></div>
	
</section>

<<<<<<< HEAD
<script id="ajax" type="text/javascript">

// var $modal = $('#ajax-modal');
// // #: only for id, 
// // .: for many class

// $('.request}}').click(function(){
// 	var itemId = $(this).attr('value');
//   // create the backdrop and wait for next modal to be triggered
//   $('body').modalmanager('loading');

//   setTimeout(function(){
//   	alert('itemID is '+itemId);
//     $modal.load("{{ URL::route('showRequest')}}"+"?itemID="+itemId,  function(){
//      	//{{ URL::route('showRequest') }}
//      // alert(result);
//      // alert(result);
//       $modal.modal();
//     });
//   }, 500);
// });


// </script>

<script type="text/javascript">

// // Pre process the error msg    
// $.ajaxSetup({
//   error: function(xhr, status, error) {
//     alert("An AJAX error occured: " + status + "\nError: " + error);
//   }
// });


// $('#accept').click(function(){

//     var $button = $(this);
//     alert('Buyer Id : '+$button.closest("tr").find('#buyerID').attr('value'));
//     // .text()
//     // { itemID: itemID, buyerID: buyerID },

//     $.get( '{{URL::route('acceptRequest')}}',  function(result){
//         console.log(result);
//         if(result == 1)
//         {
//             alert("Please Sign in or Sign up.");
//         }
//         if(result == 2)
//         {
//             alert("You accept the request");
//             $button.text('Accepted');
//             $button.attr( "disabled", "disabled" );
//         }
//     });
// });

</script>
=======

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










>>>>>>> 6bb7e9484a70092f88abce72e894625a29616b4e

{{-- JQuery to handle ajax request --}}
<script type="text/javascript">

// Pre process the error msg    
// $.ajaxSetup({
//   error: function(xhr, status, error) {
//     alert("An AJAX error occured: " + status + "\nError: " + error);
//   }
// });


$('.delete').click(function(){
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

<<<<<<< HEAD
=======



 // $(document).on('click', 'delete', function () {
 //     alert("aa");
 //     $(this).closest('tr').remove();
 //     return false;
 // });

>>>>>>> 6bb7e9484a70092f88abce72e894625a29616b4e
</script>	

@stop