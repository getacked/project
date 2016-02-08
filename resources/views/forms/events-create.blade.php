@extends('master')

@section('title')

FUCK

@stop


@section('style')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop


@section('content')

<h2 class="center"> Create an Event! </h2>

  {{ Form::open(array('route' => 'events.store', 'method' => 'POST')) }}

  <div class="input-field">
    {{ Form::text('event_name', null, ['class' => 'validate col'] ) }}
    {{ Form::label('event_name', 'Event Name') }}
  </div>


  <div class="input-field">
    <select name="type" class="browsser-default">
      <option value="" disabled selected>Choose an event category</option>
      <option value="music">Music</option>
      <option value="comedy">Comedy</option>
      <option value="conference">Conference</option>
      <option value="talk">Talk</option>
    </select>
    {{ Form::label('type', 'Type') }}
  </div>


  <div class="input-field">
    <input name="event_date" type="date" class="datepicker">
    {{ Form::label('event_date', "Date") }}
  </div>

  <div class="input-field clockpicker">
     <input type="text" class="form-control" name="event_time" value="18:00">
     {{ Form::label('event_time', "Time") }}
  </div>

  <div class="input-field">
    {{ Form::text('tickets') }}
    {{ Form::label('tickets', 'Tickets') }}
  </div>

 <!--  <div> 
    <div class="input-field">
      {{ Form::select('tags') }}
      {{ Form::label('tags', 'Tags') }}
    </div>

    <div>
      <h3>Or Create your own!</h3>
      {{ Form::textarea('customTags') }}
    </div>

  </div> -->

  {{ Form::token() }}

  {{ Form::submit('Sign up!', ['class' => 'btn']) }}
    
  {{ Form::close() }}

  @include('partials.errors')

@stop

@section('script')
<script src="/js/clockpicker.min.js"></script>
<script>
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done',
    autoclose: true
});

$(document).ready(function() {
  $('select').material_select();
});


</script>

@stop