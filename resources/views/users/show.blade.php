@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>User: {{ $user->username }}</h2> 
  <?php

    if( $user == Auth::user() ){
      echo "<small>This is you..</small>";
    }else{
      echo "<a class='btn-flat' href='" . route('subscribe', $user) . "'>Subscribe</a>";
    }

  ?>

  <h5>From: <span class="accent f5">{{ $user->location }}</span></5>
</div>

<div class="events">
  <h3>Here are all events from {{ $user->username }}</h3>

  <ul>  
    @foreach( $user->events as $event )
      <li>@include('partials.event-card')</li>
    @endforeach

  </ul>


</div>

@stop