@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Item list page
@parent
@stop

{{-- Page Content --}}
@section('content')

<h1>Now you've arrived to item list page</h1>

@foreach ($items as $item)

{{ $item->id }}
{{ $item->title }}

@endforeach 


{{ $items->links() }}
@stop