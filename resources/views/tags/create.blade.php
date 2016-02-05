@extends('master')

@section('title')

Create Tag

@stop


@section('content')

<h2 class="center"> Create an Event! </h2>

  {{ Form::open(array('route' => 'tags.store', 'method' => 'POST')) }}

  <div class="input-field">
    {{ Form::text('name', null, ['class' => 'validate col'] ) }}
    {{ Form::label('name', 'Tag Name') }}
  </div>

  {{ Form::token() }}

  {{ Form::submit('Sign up!', ['class' => 'btn']) }}
    
  {{ Form::close() }}

  @include('partials.errors')

@stop