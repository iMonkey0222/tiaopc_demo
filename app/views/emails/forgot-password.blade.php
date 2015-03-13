@extends('emails/layouts/default')

@section('content')
<p>Hello {{ $user->first_name }},</p>

<p>Please click on the following link to updated your password:</p>

<p><a href="{{ $forgotPasswordUrl }}">{{ $forgotPasswordUrl }}</a></p>

<p>If you did not request to have your password reset you can safely ignore this email. Rest assured your customer account is safe.

If clicking the link does not seem to work, you can copy and paste the link into your browser's address window, or retype it there. Once you have returned to Amazon.co.uk, we will give instructions for resetting your password.

Amazon.co.uk will never e-mail you and ask you to disclose or verify your Amazon.co.uk password, credit card, or banking account number. If you receive a suspicious e-mail with a link to update your account information, do not click on the link--instead, report the e-mail to Amazon.co.uk for investigation. Thanks for visiting Amazon.co.uk!</p>

<p>Best regards,</p>

<p>Tiaopc Team</p>
@stop
