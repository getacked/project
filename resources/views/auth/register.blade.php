@extends('master')

@section('content')

<h4 class="panel-heading">Register</h4>

    {{ Form::open(array('url' => '/register', 'method' => 'POST')) }}

   
        {!! csrf_field() !!}


        <div>
          <h5>Select User Type</h5>
          <p>
            {{ Form::radio('type', '0', 'true', array('id' => 'regular') )  }}
            {{ Form::label('regular', 'Regular') }}
          </p>
          <p>
            {{ Form::radio('type', '1', 'false', array('id' => 'host') )  }}
            {{ Form::label('host', 'Host') }}
          </p>
        </div>


        <div class="input-field">
          {{ Form::text('first_name',  old('first_name'), ['class' => 'validate col'] ) }}
          {{ Form::label('first_name', 'First Name') }}
        </div>

        <div class="input-field">
          {{ Form::text('last_name',  old('last_name'), ['class' => 'validate col'] ) }}
          {{ Form::label('last_name', 'Surname') }}
        </div>

        <div class="input-field">
          {{ Form::text('username',  old('username'), ['class' => 'validate col'] ) }}
          {{ Form::label('username', 'Username') }}
        </div>

        <div class="input-field">
          {{ Form::email('email', old('email'), ['class' => 'validate col'] ) }}
          {{ Form::label('email', 'Email') }}
        </div>

        <div class="input-field">
         {{ Form::password('password') }}
         {{ Form::label('password', 'Password')  }}
        </div>

        <div class="input-field">
          {{ Form::password('password_confirmation') }}
          {{ Form::label('password_confirmation', 'Confirm Password')  }}
         </div>



         

    
      {{ Form::token() }}

      {{ Form::submit('Submit!', ['class' => 'btn']) }}
      
    {{ Form::close() }}


    @include('partials.errors')

@stop