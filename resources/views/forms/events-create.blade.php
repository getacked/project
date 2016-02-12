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
    {{ Form::text('name', null, ['class' => 'validate col'] ) }}
    {{ Form::label('name', 'Event Name') }}
  </div>

  <?php 
    $types = ['music', 'comedy', 'conference', 'talk']; 
  ?>

  <div class="input-field">
    {{ Form::select('type', $types, null, ['class' => 'validate']) }}
    {{ Form::label('type', 'Type') }}
  </div>  

  <div class="input-field">
    {{ Form::textarea('description') }}
    {{ Form::label('description', 'Event Description')}}
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
    {{ Form::text('ticket_cap') }}
    {{ Form::label('ticket_cap', 'Tickets') }}
  </div>

  <div> 
    <div class="input-field">
      {{ Form::select('tags[]', $tags, null, ['multiple']) }}
      {{ Form::label('tags', 'Tags') }}
    </div>

    <div>
      <h3>Or Create your own! <small>(seperated by commas)</small></h3>
      {{ Form::textarea('customTags') }}
    </div>

  </div>

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