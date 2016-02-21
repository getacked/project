@extends('base')

@section('content')

  <div>
    <?php

      if( Auth::check() ){
        echo "you're in";
      }else{
        echo "no luck";
      }

    ?>
  </div>

  <ul class="events row">
    @foreach( $events as $event )
      <li class="col s12 m6 l3">
        @include('partials.event-card')
      </li>
    @endforeach
  </ul>

  <div class="center">
    <a href="{{ route('events.create') }}">
      <i class="material-icons large">add_to_queue</i>
    </a>
  </div>

@stop