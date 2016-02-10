@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>User: {{ $user->username }}</h2> 
  <?php

    $mySubs = Auth::user()->subs;
     
    if( Auth::id() != $user->id ){
      //check if the user has already subscribed to this host
      if( $mySubs->contains($user->username) ){
        printf("You are subscribed to %s.", $user->username);
      }else{
        echo "<a class='btn' href='".route('subscribe', $user)."'>Subscribe</a>";
      }
    }

    if( $user->id == Auth::id() ){
      echo "<p>This is you..</p>";
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
