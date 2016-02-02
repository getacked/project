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

 <!--  {{ Form::open(array('route' => array('events.update', $event), 'method' => 'PUT')) }} -->

  {{ Form::model($event, array('route' => array('events.update', $event), 'method' => 'PUT')) }}
  
    <div class="input-field">
     {{ Form::text('event_name', $event->event_name, ['class' => 'validate col'] ) }}
     {{ Form::label('event_name', 'Event Name') }}
    </div>

    <div class="input-field">
     {{ Form::text('type', $event->type) }}
     {{ Form::label('type', 'Type') }}
    </div>
    <div class="input-field">
     <input name="event_time" type="date" value="{{ $event->event_time }}" class="datepicker">
     {{ Form::label('event_time') }}
    </div>

    <div class="input-field clockpicker">
       <input type="text" class="form-control" name="event_time" value="18:00">
       {{ Form::label('event_time', "Time") }}
    </div>

    <div class="black white-text">
      <section class="container">
        {{ $event->event_time }}
      </section>
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
    autoclose: true
});
</script>

@stop