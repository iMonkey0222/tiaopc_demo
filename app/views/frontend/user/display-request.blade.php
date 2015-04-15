@extends('frontend/layouts/account')

{{-- Page title --}}
@section('account-page-title')
    <h3>My Profile</h3>
    <span><h4>View Requests</h4></span>
@stop

@section('account-content')
<a href="{{ route('published-items') }}" class="btn btn-link">Back</a>
		<table class="table table-striped">
{{--          	<thead>
         		<tr>
         			<th>Product</th>
         			<th>Applicants</th>
         			<th></th>
         			<th></th>
         		</tr>
            </thead> --}}				                   				
         		<tbody>
       					@foreach($item->transactions as $t)	
       					{{-- <p>{{var_dump($t)}}</p>	 --}}	                		
       					<tr>
         				{{-- Production Name --}}
         				<td id = "item" value = "{{$item->id}}">{{$item->title}}</td>
         				{{-- Requested By						                   				 --}}
         				<td id = "buyerID" value = "{{$t['buyer_id']}}" >
                            <i class = "icon-user"></i>
                            {{$t->buyerNickname}}
                        </td>
         				{{-- When --}}
         				<td id = "time">{{$t->updated_at}}</td>
         				{{-- Action --}}
         			
         				@if($t->status == 1)
         				<td><button class="accept button button-3d button-mini button-rounded button-green" >Accept</button></td>

                        @elseif($t->status == 2 || $t->status == 3 )						                   			
         				<td><button class="button button-3d button-mini button-rounded button-amber">Approved</button></td>
                        @endif
                       
                        <td>
                            <a class = "deal-{{$t['buyer_id']}} button button-3d button-mini button-rounded button-green" value = "{{$t['buyer_id']}}" {{($t->status == 2) ? ' ':'style="display: none;"'}}>Make a Deal<a>
                            <a class = "button button-3d button-mini button-rounded button-amber" value = "{{$t['buyer_id']}}" {{($t->status == 3) ? ' ':'style="display: none;"'}}>Dealed<a>
                        </td>     				
         			</tr>
         			@endforeach
         		</tbody>				                   			
       
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
            $button.attr("class", "accept button button-3d button-mini button-rounded button-amber");

            // alert('byuer id !!:'+buyerID);
            alert('你接受了对方的请求。');
            // $('#dealTitle').show();
            $('.deal-'+buyerID).show();
        }
        if(result ==3)
        {
			alert("Error."+"\n Sorry about the unconvience."+" Please contact us.");
        }
        if(result == 4){
            alert("Sorry"+"\n"+"You have already made a deal with other buyer." + "\nYour product has been sold.");

        }
    });
});

</script>

<script id = "makeAdeal" type="text/javascript">
    $(document).ready(function(){

        // $('#dealTitle').hide(); // hide the title
        
        // use selector get all deal button
        // $("a[class^=deal-]").hide();

        //$('.deal-').hide();
    });

    // $('.deal-').click(function(e){
    $("a[class^=deal-]").click(function(){
        var $button = $(this);

        
        var respond = confirm("You will make a deal with this buyer. "+"\n"+"- If you are sure please continue."+"\n"+"- If not sure please press cancel."); 

        // if user decide to make a deal
        if(respond == true){

            var itemID = $(this).closest("tr").find('#item').attr('value');
            var buyerID = $(this).closest("tr").find('#buyerID').attr('value');

            $.get('{{ URL::route('makeDeal') }}', { itemID: itemID, buyerID: buyerID }, function(result){

                console.log(result);    

                // alert(result);  

                if(result == 1){
                    alert("Please Sign in or Sign up.");
                }
                if(result == 2){
                    $button.text('Dealed');
                    $button.attr("class","deal button button-3d button-mini button-rounded button-amber");
                    $button.attr( "disabled", "disabled");
                }
                if(result == 3){
                    alert("Deal made unsuccessfully. Please contact us.");
                }
                if(result == 4){
                    alert("Sorry, your item has already sold out.");
                }   

            });

        }
       
    });
</script>

@stop

