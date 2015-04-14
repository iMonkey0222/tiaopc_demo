@extends('emails/layouts/default')

@section('content')
<p>Hello {{ $user->first_name }},</p>

<p>Thanks for using Tiaopc, one of your reuqests has been approved, please follow the link below to check the seller info and <strong>Get in Touch</strong> </p>

<p><a href="{{ route('singleItem', $itemID) }}">{{ route('singleItem', $itemID) }}</a></p>

<p>Best regards,</p>

<p>Tiaopc Team</p>
@stop
