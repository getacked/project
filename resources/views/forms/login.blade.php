{{ Form::open(array('url' => $url, 'method' => 'POST', 'class' => 'row')) }}
 
  <div class="row">
    <div class="input-field col s6">
      {{ Form::email('email', old('email'), ['class' => 'validate col'] ) }}
      {{ Form::label('email', 'Email') }}
    </div>

    <div class="input-field col s6">
      {{ Form::password('password') }}
      {{ Form::label('password', 'Password')  }}
    </div>
  </div>

  {{ Form::submit($buttonText, ['class' => 'btn']) }}
  
{{ Form::close() }}

@include('partials.errors')