@extends('base')

@section('title')
Contact Us!
@endsection


@section('content')
    <div class="container" id="login-container">
      <section>
      <h4>Have a Burning Question on Your Mind?</h4>
      <p>Feel free to drop an email in to one of our staff members below!</p>
    </section>
    <section>
      <form class="col s12" action="#">
        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="password" type="password" class="validate">
          <label for="password">Name:</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email" data-error="wrong" data-success="right">Email Address:</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Message:</label>
        </div>
        </div>
        <div class="col s3">
          <input type="submit" value="Ask!" class="btn"/>
        </div>
      </form>
    </section>
    </div>
@endsection