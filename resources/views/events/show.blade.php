@extends('base')

@section('title')
{{ $event->name }}
@endsection

@section('styles')
  <link rel="stylesheet" href="eventstyles.css">
@endsection


@section('content')

  <div class="container">
    <section>
      <figure>
        @if($event->image)   
            <?php
                $path = App\Image::find($image)->fileName;
            ?>
             <img alt="{{ $event->name }} image" class="responsive-img center-block"  src="/images/{{ $path }}" />
        @else 
            <img alt="{{ $event->name }} image" class="responsive-img center-block" src="http://lorempixel.com/850/480" />
        @endif
      </figure>

      <div class="divider"></div>
      <h4 class="center-align">{{$event->name}}</h4>
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
          <td>{{ $event->type }}</td>
        </tr>
        <tr>
          <td id="left">Starts In</td>
          <td>{{ $event->event_time->diffForHumans() }}</td>
        </tr>
      </tbody>
    </table>

      <br>
      <div class="divider"></div>

      <section>
        <h5 class="center-align">Tags</h5>
        <div class="row">
          @foreach( $event->tags as $tag )
            <div class="col s4 m3 l2">
              <p class="center-align">
                {{$tag->name}}
              </p>
            </div>
          @endforeach
        </div>
      </section>
    </section>
  </div>
@endsection