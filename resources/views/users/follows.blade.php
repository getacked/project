@extends('master')


@section('content')


<?php
  $user = Auth::user();
?>

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h3>Here are your subscriptions</h3>
</div>

<div class="subscriptions">

@foreach( $user->subs as $sub )
  <p>{{ $sub->username }}</p>
  <?php 
    $upcoming = $sub->events()->orderBy('event_time')->take(4);
    // dd($upcoming);
    foreach( $upcoming as $event )
    {
      // dd($event);
    }
  ?>
  @foreach($upcoming as $event)
    
    @include('partials.event-card', $event);
    
  @endforeach

@endforeach

</div>

@stop