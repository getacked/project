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
  <p>{{ $sub->username }}</p>

@endforeach

</div>

@stop