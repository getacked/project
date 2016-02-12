@extends('base')

@section('title')
FAQ
@endsection

@section('content')

    <div class="container" id="login-container">
      <section>
      <h4>Welcome to the Eventure FAQ.</h4>
      <p>Have a look at some of the questions we have below. Knowledge lies within.</p>
      <div class="divider"></div>
    </section>
    <section>
      <ul class="collapsible popout" data-collapsible="expandable">
      <li>
          <div class="collapsible-header">
          <i class="material-icons">filter_drama</i>
        What is the craic with signing up?
        </div>
          <div class="collapsible-body">
          <p>
        Lorem ipsum dolor sit amet.
        </p>
        </div>
        </li>
        <li>
          <div class="collapsible-header">
          <i class="material-icons">place</i>
        How in the name of Christ do I log in?
          </div>
          <div class="collapsible-body">
          <p>
          Lorem ipsum dolor sit amet.
          </p>
        </div>
        </li>
        <li>
          <div class="collapsible-header">
          <i class="material-icons">whatshot</i>
        Any Hash?
        </div>
          <div class="collapsible-body">
          <p>
        Lorem ipsum dolor sit amet.
        </p>
        </div>
        </li>
      <li>
          <div class="collapsible-header">
          <i class="material-icons">whatshot</i>
        How Do I Edit My Information?
        </div>
          <div class="collapsible-body">
          <p>
        Lorem ipsum dolor sit amet.
        </p>
        </div>
        </li>
      <li>
          <div class="collapsible-header">
          <i class="material-icons">whatshot</i>
        As a Venue, how will I be discovered? 
        </div>
          <div class="collapsible-body">
          <p>
        Lorem ipsum dolor sit amet.
        </p>
        </div>
        </li>
        </ul>
    </section>
    <section>
      <div class="divider"></div>
      <h5>FAQ not cutting the mustard?</h5>
      <p class="flowtext">
      We at Eventure all live in the internet and have no connection with reality so there may be a 
      question that you could have that hasn't been answered at all yet. If so, feel free to drop us a message 
      on our contact page by clicking the button below!
      </p>
      <a href="contact.html" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Contact Page</a>
      <p class="flowtext">
      You never know there may be others out there with the same question so push the boat, be all that you can be, ask the question
      and help your fellow humans! 
      </p>
    </section>
    </div>

@endsection
