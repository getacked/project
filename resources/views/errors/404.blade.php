@extends('base')


@section('title')
 Oops! Something's wrong.
@stop

@section('content')

  <div class="container flow-text">
    <br>
    <h5 class="center-align">Sorry, the page you're trying to access cannot be reached right now.</h5>
    <div class="row valign-wrapper">
      <div class="divider col s4 valign"></div>
      <div class="col s4 center-align">
        <i class="material-icons large">error</i>
      </div>
      <div class="divider col s4 valign"></div>
    </div>
    <h5 class="center-align">It is possible this page isn't here.</h5>
    <p>
      If you feel the page you're looking for should be here feel free to contact us
      from the link below...
    </p>
    <div class="row valign-wrapper">
      <div class="divider col s4 valign"></div>
      <div class="col s4 center-align">
       <a href="{{ route('contact') }}" class="waves-effect waves-light btn">Contact Us</a>
      </div>
      <div class="divider col s4 valign"></div>
    </div>
    <p>
      In the mean time, why not try going <a href="{{ route('landing') }}">home</a> and 
      seeing what other cool pages we have to show you!
    </p>
  </div>

@stop