@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Single item page
@parent
@stop

{{-- Page Content --}}
@section('content')

<h1>Now you've arrived to single item page</h1>


<button type="button" onclick="alert('Hello world!')">Request</button>


{{ $item }}

{{ $pictures }}

@foreach ($pictures as $picture)

{{ HTML::image('/assets/img/'.($picture->picture_name)) }}

<br>

@endforeach

@stop