@extends('master')

@section('title')

FUCK

@stop

@section('content')

<h2> Make a User Account! </h2>

  {{ Form::open(array('route' => 'users.store', 'method' => 'POST')) }}

   <div class="input-field">
    {{ Form::text('name', null, ['class' => 'validate'] ) }}
    {{ Form::label('name', 'Your Name') }}
   </div>

   <div class="input-field">
    {{ Form::text('email') }}
    {{ Form::label('email', 'Your Email Address') }}
   </div>

   <div class="input-field">
    {{ Form::text('location') }}
    {{ Form::label('location', 'Your Location') }}
   </div>

   <div class="input-field">
    {{ Form::password('password') }}
    {{ Form::label('password')  }}
   </div>

    {{ Form::token() }}

    {{ Form::submit('Submit!', ['class' => 'btn']) }}
    
  {{ Form::close() }}

@stop