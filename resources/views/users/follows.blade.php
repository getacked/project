@extends('base')


@section('content')


<?php
  $user = Auth::user();
?>

<a href="{{ route('dashboard') }}">
  &larr; Your Dashboard
</a>

<div class="center">
  <h3>Here are your subscriptions</h3>
</div>

<div class="subscriptions">

@foreach( $user->subs as $sub )
  <h5>Events by <a href="">{{ $sub->username }}</a>:</h5>
  <div class="upcoming-subs row">
    <?php
      $upcomingEvents = $sub->events()->nextWeek(4)->get();
     ?>
    @unless( $upcomingEvents->isEmpty() )
      @foreach($upcomingEvents as $event)
        <div class="col s6">
          @include('partials.event-card', $event);
        </div>
      @endforeach
    @else
      <div class="col s12">
        No upcoming events from this user. 
      </div>
    @endif
  </div>
@endforeach

</div>

@stop