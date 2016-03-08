@extends('base')

@section('title')
Login
@endsection


@section('content')

  <div class="container">
    <section>
      <h4>Login Below to Start Another Eventure!</h4>
      <p>Enter your username &amp; password to continue</p>
      @include('partials.message')

      @include('forms.login', array('url' => '/login', 'buttonText' => 'Log In!'))

      <p>Forgot your password? <a href="{{ route('reset-password') }}">Click here.</a></p>
      <section>
        <div class="divider"></div>
          <h5>Having trouble logging in?</h5>
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