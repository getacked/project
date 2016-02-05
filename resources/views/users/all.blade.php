@extends('master')

@section('content')

  <div class="accent">
    <?php

      if(Auth::check()){
        echo "You're logged in as " . Auth::user()->username ;
      }else{
        echo "no luck";
      }

    ?>
  </div>

  @forelse( $users as $user )

    <div class="card">
      <div class="card-content">
        <a href="/users/{{ $user->id }}">{{ $user->username }}</a>
      </div>
      <div class="card-action">
        WOT
      </div>

    </div>

  @endforeach


  {{ link_to_route('users.create', 'Create Account') }}

@stop