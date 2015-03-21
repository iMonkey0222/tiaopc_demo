@extends('frontend/layouts/account')

{{-- Page title --}}
@section('account-page-title')
    <h3>My Profile</h3>
    <span><h4>View Requests</h4></span>
@stop

@section('account-content')
<a href="{{ route('published-items') }}" class="btn btn-link">Back</a>
		<table class="table table-striped">
         	<thead>
         		<tr>
         			<th>Product Name</th>
         			<th>Requested By</th>
         			<th>Request Time</th>
         			<th>Action</th>
         		</tr>				                   				
         		<tbody>
       					@foreach($item->transactions as $t)	
       					{{-- <p>{{var_dump($t)}}</p>	 --}}	                		
       					<tr>
         				{{-- Production Name --}}
         				<td id = "item" value = "{{$item->id}}">{{$item->title}}</td>
         				{{-- Requested By						                   				 --}}
         				<td id = "buyerID" value = "{{$t['buyer_id']}}" >{{$t->buyerNickname}}</td>
         				{{-- When --}}
         				<td id = "time">{{$t->created_at}}</td>
         				{{-- Action --}}
         			
         				@if($t->status == 1)
         				<td><button class="accept button button-3d button-mini button-rounded button-green" >Accept</button></td>
                        @elseif($t->status == 2)						                   				
         				<td><button id="accept" class="button button-3d button-mini button-rounded button-green">Approved</button></td>
                        @endif
         				
         			</tr>
         			@endforeach
         		</tbody>				                   			
         	</thead>
         </table>

<script type="text/javascript">

// Pre process the error msg    
$.ajaxSetup({
  error: function(xhr, status, error) {
    alert("An AJAX error occured: " + status + "\nError: " + error);
  }
});


$('.accept').click(function(){

    var $button = $(this);
    
    var buyerID = $(this).closest("tr").find('#buyerID').attr('value');
    var itemID = $(this).closest("tr").find('#item').attr('value');

    // alert('Buyer Id : '+buyerID+ 'Item id :'+itemID);
    // .text()
    // { itemID: itemID, buyerID: buyerID },

    $.get( '{{URL::route('acceptRequest')}}', {itemID: itemID, buyerID: buyerID}, function(result){
    	// alert(result);
        console.log(result);
        if(result == 1)
        {
            alert("Please Sign in or Sign up.");
        }
        if(result == 2)
        {
            // alert("You accept the request");
            $button.text('Approved');
            $button.attr( "disabled", "disabled" );
        }
        if(result ==3)
        {
			alert("Error occurs. Please contact manager.");
        }
    });
});

</script>
@stop

