@extends('base')

@section('title')
Browse Events
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
  });
</script>
@endsection


@section('content')
<div class="container row">
    <div class="col s9">
      <h4 class="center-align">Look At This Shit</h4>
      <div class="divider"></div>
      <div class="row">
        @foreach( $events as $event )
          @include('partials.event-card-small', $event)
        @endforeach
      </div>
      <div class="row">
        <div class="center-align">
          <a href="{{ route('events.create') }}">
            <i class="material-icons large">add_to_queue</i>
          </a>
        </div>
      </div>
    </div>

    <div class="col s3">
      <div class="tabs-wrapper pinned">
        <br>
        <br>
        MENU
        <!--Implement some kind of search form here, would be lovely :) -->
      </div>
    </div>
</div>
@stop