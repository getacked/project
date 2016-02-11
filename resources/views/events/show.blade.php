@extends('master')


@section('content')

  <a href="{{ route('events.index') }}">
    &larr; All Events
  </a>
<div class="center">
  <h2>Event: {{ $event->event_name }}</h2> 
  <p>{{ $event->type }}</p>
  <?php
    echo "<small>";
    // dd($event->host);
    if( $event->host == Auth::user() ){
      echo "<a href='" . route('events.edit', $event)."'>";
      echo "<p class='chip'>Edit event <i class='material-icons'>mode_edit</i></a>";
    }else{
      echo $event->host['username'] . "'s event<br>";
      echo "<a class='btn' href='". route('events.attend', $event) . "'>Attend!</a>";
    }
    echo "</small>";
  ?>


  <h5>At: 
  {{ $event->event_time->toDayDateTimeString() }}</h5>
  <span class="accent f5">{{ $event->event_time->diffForHumans() }}</span>


  @if ( count($event->tags) > 0 )
  <div class="teal">
    <h5>Tags:</h5>
      <ul class="tag-list">
        @foreach ( $event->tags as $tag )
          <li class="tag-item">
            <a href="{{ route('tags.show', $tag->id) }}">
              {{ $tag->name }}
            </a>
          </li>
        @endforeach
    </ul>
  </div>
  @endif

  @if ( count($event->attendees) > 0 )
  <div class="teal">
    <h5>People attending: ({{count($event->attendees)}})</h5>
      <ul class="tag-list">
        @foreach ( $event->attendees as $attendee )
          <li class="tag-item">
              {{ $attendee->username }}
            </a>
          </li>
        @endforeach
    </ul>
  </div>
  @endif



</div>


@stop