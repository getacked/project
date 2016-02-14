@extends('base')

@section('title')
Login
@endsection


@section('content')
    <div class="container">
        <section>
        <section>
            <h4>Login Below to Start Another Eventure!</h4>
            @include('partials.message')
            <p>Enter your username &amp; password to continue</p>
          </section>
          {{ Form::open(array('url' => '/login', 'method' => 'POST', 'class' => 'col s12')) }}
          <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate" name="email">
            <label for="email">Email</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">vpn_key</i>
            <input id="password" type="password" class="validate" name="password">
            <label for="password">Password</label>
          </div>
          </div>
          <div class="col s3">
          <input type="submit" value="Login" class="btn"/>
          </div>
        </form>

        @include('partials.errors')

        <br>
      </section>
      <section>
        <div class="row">
          <div class="divider"></div>
        <h5>Still having trouble logging in?</h5>
          </div>
        <div class="row">
          <p class="flowtext">
          Step one; don't panic, you're not alone out there. Try refreshing your browser and re-entering your credentials.
          Make sure you have turned off caps lock on your machine because let's be honest we've all been there. 
        </p>
        <p class="flowtext">
          If you're still having trouble click {{ link_to_route('faq', 'here') }} To go to our FAQ page. It could be something on
          our end so bare with us and we'll have you well on your way to getting to the crux of the problem in no time!
        </p>
        </div>
      </section>
  </div>   
@endsection