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
      
        <!--Lots of controlled variables used here-->
        <img alt="{{event.name}}event image" class="responsive-img center-block" src=" 
        @if(isset $event.image )
          {{$event.image}}{{ $event.image.extension}} 
        @else 
          default.jpg 
        @endif"/>
      </figure>
      <div class="divider"></div>
      <h4 class="center-align">{{$event.name}}</h4>
      <div class="divider"></div>
      <br>
      <table class="centered highlight">
      <tbody>
        <tr>
          <td id="left">Location</td>
        <td>{{$event.loaction}}</td>
        </tr>
        <tr>
          <td id="left">Date</td>
        <td>{{$event.date}}</td>
        </tr>
        <tr>
          <td id="left">Time</td>
        <td>{{$event.time}}</td>
        </tr>
        <tr>
          <td id="left">Type</td>
        <td>{{$event.type}}</td>
        </tr>
        <tr>
          <td id="left">Starts In</td>
        <td>{{$event.something}}</td>
        </tr>
      </tbody>
      </table>
      <br>
      <div class="divider"></div>
      <section>
        <h5 class="center-align">Tags</h5>
      <div class="row">
        @foreach( $tags as $tag )
          <div class="col s4 m3 l2">
            <p class="center-align">
            {{$tag.name}}
            </p>
          </div>
        @endforeach
      </div>
      </section>
    </section>
  </div>
@endsection