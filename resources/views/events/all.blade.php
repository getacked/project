@extends('master')

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

  <div class="events row">
    @forelse( $events as $event )

      @include('partials.event-card')

    @endforeach
  </div>

  <div class="center">
    <a href="{{ route('events.create') }}">
      <i class="material-icons large">add_to_queue</i>
    </a>
  </div>

@stop