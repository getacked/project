@extends('master')

@section('content')

  <div class="accent">
    <?php

      if(Auth::check()){
        echo "You're logged in as " . Auth::user()->name ;
      }else{
        echo "no luck";
      }

    ?>
  </div>

  @forelse( $organisers as $organiser )

    <div class="card">
      <div class="card-content">
        <a href="/organisers/{{ $organiser->id }}">{{ $organiser->name }}</a>
      </div>
      <div class="card-action">
        WOT
      </div>

    </div>

  @endforeach


  {{ link_to_route('organisers.create', 'Create Organiser Account') }}

@stop