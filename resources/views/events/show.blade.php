@extends('base')

@section('title')
{{ $event->name }}
@endsection

@section('content')

  <div class="container">
    <section>
      <figure>
        @if($event->photo)   
           <?php
               $photo = $event->photo;
               $path = $photo->fileName . $photo->mime;
           ?>
            <img alt="{{ $event->name }} image" class="responsive-img center-block"  src="/images/uploads/{!! $path !!}" />
        @else 
            <img alt="{{ $event->name }} image" class="responsive-img center-block" src="http://lorempixel.com/1000/480" />
        @endif
      </figure>

      <div class="divider"></div>
      <h4 class="center-align">{{$event->name}}</h4>
      <h5 class="center-align">by <a href="{{ route('dashboard', $event->host) }}">{{ $event->host->username }}</a></h5>
          <div class="center-align">
          <p class="center-align">Tickets left: {{ $event->ticket_left }}
            <?php
              if( $event->host == Auth::user() ){
                echo "<a href='" . route('events.edit', $event)."'>";
                echo "<p class='chip'>Edit event <i class='material-icons'>mode_edit</i></a>";
              }else{
                if( !$event->attendees->contains(Auth::user()) && Auth::check() ){
                  echo "<a class='btn-large' href='". route('events.attend', $event) . "'>Attend!</a>";  
                }
              }
            ?>
          </p>
          </div>
      <div class="divider"></div>
      <br>
      <table class="centered highlight">
      <tbody>
        <tr>
          <td id="left">Location</td>
          <td>{{ $event->location }}</td>
        </tr>
        <tr>
          <td id="left">Date</td>
          <td>{{ $event->event_time->format('d F, Y') }}</td>
        </tr>
        <tr>
          <td id="left">Time</td>
        <td>{{ substr($event->event_time->toTimeString(), 0, 5) }}</td>
        </tr>
        <tr>
          <td id="left">Type</td>
          <td>{{ $event->event_type }}</td>
        </tr>
        <tr>
          <td id="left">Starts In</td>
          <td>{{ $event->event_time->diffForHumans() }}</td>
        </tr>
      </tbody>
    </table>

<!-- TAGS -->

    @if( count($event->tags) > 0 )
      <div class="divider"></div>
      <section>
        <h5 class="center-align">Tags</h5>
        <div class="row">
          @foreach( $event->tags as $tag )
            <div class="col s4 m3 l2">
              <p class="center-align">
                <li><a href="{{ route('tags.show', $tag) }}">
                  {{$tag->name}}
                </a></li>
              </p>
            </div>
          @endforeach
        </div>
      </section>
    @endif

    <div class="divider"></div>

    @if( $event->gmaps_id )
      <div class="gmaps-container">
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <h5>Where?</h5>
            </div>
            <div class="collapsible-body">
              <iframe
                width="600"
                height="450"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM
                  &q=place_id:{{ $event->gmaps_id }}" allowfullscreen>
              </iframe>
              <img class="right" src="/images/powered_by_google_on_white.png" />
            </div>
          </li>
        </ul>
      </div>
    @endif

    
<!-- ATTENDEES -->
    @if ( count($event->attendees) > 0 )
    <div class="divider"></div>
      <section class="flow-text">
        <h5>People attending: ({{count($event->attendees)}})</h5>
          <ul>
            @foreach ( $event->attendees as $attendee )
              <li> 
                  - {{ $attendee->username }}
              </li>
            @endforeach
        </ul>
      </section>
    @endif



    </section>
  </div>
@endsection

