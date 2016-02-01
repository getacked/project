@extends('master')


@section('content')

  <a href="{{ route('events.index') }}">
    &larr;
  </a>
<div class="center">
  <h2>Event: {{ $event->event_name }}</h2> 
  <?php
    echo "<small>";
    if( $event->user == Auth::user() ){
      echo "<a href='" . route('events.edit', $event)."'>";
      echo "<p class='chip'>Edit event <i class='material-icons'>mode_edit</i></a>";
    }else{
      echo $event->user['name'] . "'s event";
    }
    echo "</small>";
  ?>

  <h5>At: <span class="accent f5">{{ $event->event_time->diffForHumans() }}</span></5>
</div>


@stop