@extends('base')

@section('title')
Login
@endsection


@section('content')
  <div class="container">
    <section>
      <h4>Login Below to Start Another Eventure!</h4>
      <p>Enter your username &amp; password to continue</p>
 

      {{ Form::open(array('url' => '/login', 'method' => 'POST', 'class' => 'row')) }}
        {!! csrf_field() !!}

        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          {{ Form::email('email', old('email'), ['class' => 'validate col'] ) }}
          {{ Form::label('email', 'Email') }}
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">vpn_key</i>
          {{ Form::password('password') }}
          {{ Form::label('password', 'Password')  }}
        </div>

        {{ Form::token() }}
        {{ Form::submit('Log In!', ['class' => 'btn']) }}
      {{ Form::close() }}

      @include('partials.errors')

      <section>
        <div class="divider"></div>
          <h5>Still having trouble logging in?</h5>
          <p>
            Step one; don't panic, you're not alone out there. Try refreshing your browser and re-entering your credentials.
            Make sure you have turned off caps lock on your machine because let's be honest we've all been there. 
          </p>
          <p>
            If you're still having trouble click {{ link_to_route('faq', 'here') }} To go to our FAQ page. It could be something on
            our end so bare with us and we'll have you well on your way to getting to the crux of the problem in no time!
          </p>
      </section>

  </section>
</div>   
@endsection