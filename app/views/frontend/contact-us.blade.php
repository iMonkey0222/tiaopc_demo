
@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Page Not Found 404
@parent
@stop


@section('page-title')
<section id="page-title">
    <div class="container clearfix">
        <h3>About Us</h3>
        <span></span>
        <ol class="breadcrumb">
            <li><a class="icon-home" href="#">Home</a></li>
            <li class="active icon-user">About Us</li>
        </ol>
    </div>

</section>
@stop

{{-- Page content --}}
@section('content')
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <h2>Feedback</h2>
            
          <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post" novalidate="novalidate">

                            <div class="form-process"></div>

                            <div class="col_half">
                                <label for="template-contactform-name">Name <small>*</small></label>
                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" aria-required="true">
                            </div>

                            <div class="col_half col_last">
                                <label for="template-contactform-email">Email <small>*</small></label>
                                <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control" aria-required="true">
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="template-contactform-message">Message <small>*</small></label>
                                <textarea class="required sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30" aria-required="true"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                            </div>

                            <div class="col_full">
                                <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                            </div>

                        </form>

            </div>

        </div>

    </div>

</section><!-- #content end -->
</section>
@stop
 


