@extends('master')


@section('style')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop

@section('content')

  <a href="" onclick="history.go(-1)">
    &larr;
  </a>
<div class="center">
  <h2>Update Event</h2>


  {{ Form::model($event, array('route' => array('events.update', $event), 'method' => 'PUT')) }}
  
    <div class="input-field">
     {{ Form::text('event_name', $event->event_name, ['class' => 'validate col'] ) }}
     {{ Form::label('event_name', 'Event Name') }}
    </div>

    <?php 
      $date = $event->event_time->format('d F, Y');
      $time = substr($event->event_time->toTimeString(), 0, 5);
    ?>

    <div class="input-field">
     <input name="event_date" type="date" value="{{ $date }}" class="datepicker">
     {{ Form::label('event_date', "Date") }}
    </div>

    <div class="input-field clockpicker">
       <input type="text" class="form-control" name="event_time" value="{{ $time }}">
       {{ Form::label('event_time', "Time") }}
    </div>

    <div class="input-field">

     {{ Form::text('tickets', $event->tickets) }}
     {{ Form::label('tickets', 'Tickets') }}
    </div>
        

    {{ Form::token() }}

    {{ Form::submit('Update Event', ['class' => 'btn']) }}

  {{ Form::close() }}
 
  @include('partials.errors')

</div>


@stop

@section('script')
<script src="/js/clockpicker.min.js"></script>
<script>
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done',
    autoclose: false

});
</script>

@stop