@extends('master')

@section('content')


<h4 class="panel-heading">Log In</h4>

    {{ Form::open(array('url' => '/login', 'method' => 'POST')) }}

   
        {!! csrf_field() !!}

        <div class="input-field">
          {{ Form::email('email', old('email'), ['class' => 'validate col'] ) }}
          {{ Form::label('email', 'Email') }}
        </div>

        <div class="input-field">
         {{ Form::password('password') }}
         {{ Form::label('password', 'Password')  }}
        </div>
<!--            <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div> -->

                            <h4>checkbox? remember me?</h4>
    
      {{ Form::token() }}

      {{ Form::submit('Log In!', ['class' => 'btn']) }}
      
    {{ Form::close() }}


    @include('partials.errors')

@endsection
