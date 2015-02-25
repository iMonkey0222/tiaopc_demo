<div class="container clearfix">
@if ($errors->any())
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Error</h4>
	Please check the form below for errors
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Success</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-error alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Error</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Warning</h4>
	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Info</h4>
	{{ $message }}
</div>
@endif

{{-- Notification Aumatically Fade out --}}
<script type="text/javascript">
	$(document).ready (function(){
		$(".alert").alert();
		window.setTimeout(function() {
    		$(".alert").fadeTo(500, 0).slideUp(500, function(){
        	$(this).remove(); 
    		});
		}, 5000);
 });

</script>


</div>
