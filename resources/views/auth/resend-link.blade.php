@extends('base')

@section('title')
Resend Confirmation Link
@endsection


@section('content')

  <div class="container">
    <section>
      <h4>Resend Email Confirmation Link</h4>
      <p>Enter your username &amp; password to send link</p>
      @include('partials.message')

      @include('auth/login-form', array('url' => '/resend', 'buttonText' => 'Resend Link'))

  </section>
</div>   
@endsection