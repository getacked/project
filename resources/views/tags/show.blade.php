@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>Tag: {{ $tag->name }}</h2> 
</div>

<div class="events">
  <h3>Here are all events with the <span class="accent">{{ $tag->name }}</span> tag</h3>

  <ul>  
    @foreach( $tag->events as $event )
      <li>@include('partials.event-card')</li>
    @endforeach

  </ul>


</div>

@stop