@extends('emails/layouts/default')

@section('content')
<p>Hello {{ $user->first_name }},</p>

<p>Thanks for using Tiaopc, one of your items has been requested, please login to your account and <strong>accept the request</strong> </p>

<p><a href="{{ route('signin') }}">Click here to login in</a></p>

<p>Best regards,</p>

<p>Tiaopc Team</p>
@stop

