@extends('master')


@section('content')


<?php
  $user = Auth::user();
?>

<a href="" onclick="history.go(-1)">
  &larr;
</a>

<div class="center">
  <h3>Here are your subscriptions</h3>
</div>

<div class="subscriptions">

@foreach( $user->subs as $sub )
  <h5>Events by <a href="">{{ $sub->username }}</a>:</h5>
  <div class="upcoming-subs row">
    @foreach($sub->events as $event)
      <div class="col s3">
        @include('partials.event-card-small', $event);
      </div>
    @endforeach
  </div>
@endforeach

</div>

@stop