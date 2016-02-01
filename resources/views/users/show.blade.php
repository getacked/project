@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>User: {{ $user->name }}</h2> 
  <?php

    if( $user == Auth::user() ){
      echo "<small>This is you..</small>";
    }

  ?>

  <h5>From: <span class="accent f5">{{ $user->location }}</span></5>
</div>

<div class="events">
  <h3>Here are all events from {{ $user->name }}</h3>

  <ul>  
    @foreach( $user->events as $event )
      <li>@include('partials.event-card')</li>
    @endforeach

  </ul>


</div>

@stop