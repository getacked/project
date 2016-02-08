@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>User: {{ $user->username }}</h2> 
  <?php

    $mySubs = Auth::user()->subs->toArray();
    $subscribed = false;

    //check if the user has already subscribed to this host
    foreach( Auth::user()->subs->toArray() as $sub){
      if ( in_array($user->username, $sub)  ){
        $subscribed = true;
      }
    }

    if( $subscribed ){
      printf("You are subscribed to %s.", $user->username);
    }else{
      echo "<a class='btn' href='".route('subscribe', $user)."'>Subscribe</a>";
    }

    if( $user == Auth::user() ){
      echo "<small>This is you..</small>";
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
