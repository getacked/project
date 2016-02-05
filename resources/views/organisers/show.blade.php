@extends('master')


@section('content')

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h2>organiser: {{ $organiser->name }}</h2> 
  <?php

    if( $organiser == Auth::user() ){
      echo "<small>This is you..</small>";
    }

  ?>

  <h5>From: <span class="accent f5">{{ $organiser->location }}</span></5>
</div>

<div class="events">
  <h3>Here are all events from {{ $organiser->name }}</h3>

  <ul>  

  </ul>


</div>

@stop