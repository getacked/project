@extends('base')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>Tag: {{ $tag->name }}</h2> 
</div>

<div class="events">
  <h3>Here are all events with the <span class="accent">{{ $tag->name }}</span> tag</h3>

  <ul class="row">  
    @foreach( $tag->events as $event )
      <li class="col s12 m4">@include('partials.event-card')</li>
    @endforeach
  </ul>


</div>

@stop