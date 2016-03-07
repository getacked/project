@extends('base')

@section('title')
Reset your password
@endsection


@section('content')

  <div class="container">
    <section>
      <h4>Reset your password</h4>
      <p>Enter password to reset to.</p>

      @include('partials.errors')

      {{ Form::open(array('url' => url('/password/reset'), 'method' => 'POST', 'class' => 'row')) }}
      <input type="hidden" name="token" value="{{ $token }}">

      <div class="row">
        <div class="input-field col s6">
          {{ Form::email('email', $email, ['class' => 'validate col'] ) }}
          {{ Form::label('email', 'Email') }}
        </div>

      </div>

      <div class="row">
        <div class="input-field col s12">
         <i class="material-icons prefix">vpn_key</i>
         {{ Form::password('password', ['class' => 'validate']) }}
         {{ Form::label('password', 'Password')  }}
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
           <i class="material-icons prefix">vpn_key</i>
            {{ Form::password('password_confirmation', ['class' => 'validate']) }}
            {{ Form::label('password_confirmation', 'Confirm Password')  }}
         </div>
      </div>
          {{ Form::submit('Reset Password', ['class' => 'btn']) }}
        {{ Form::close() }}

  </section>
</div>   
@stop


