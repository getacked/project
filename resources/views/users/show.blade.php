@extends('base')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>User: {{ $user->username }}</h2> 
  <?php

    if( Auth::check() )
    {
      $mySubs = Auth::user()->subs;
       
      if( Auth::id() != $user->id ){
        //check if the user has already subscribed to this host
        if( $mySubs->contains($user->username) ){
          printf("You are subscribed to %s.", $user->username);
        }else{
          echo "<a class='btn' href='".route('subscribe', $user)."'>Subscribe</a>";
        }
      }
  
    }

  ?>

  <h5>From: <span class="accent f5">{{ $user->location }}</span></5>
</div>

<div class="events">
  <h3>Upcoming events from {{ $user->username }}</h3>

  <ul class="row">  
    @foreach( $user->events as $event )
      <li class="col s12 m4">@include('partials.event-card')</li>
    @endforeach

  </ul>


</div>

@stop
