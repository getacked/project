@extends('base')

@section('title')
FAQ
@endsection

@section('content')

  <div class="container">
    <br>
    <section>
      <h4>Welcome to the Eventure FAQ.</h4>
      <p>Have a look at some of the questions we have below. Knowledge lies within.</p>
      <div class="divider"></div>
    </section>

    <section>
      <ul class="collapsible popout" data-collapsible="expandable">
        <li>
          <div class="collapsible-header">
           <i class="material-icons">account_box</i>
           What is the craic with signing up?
          </div>
          <div class="collapsible-body">
            <p>
            To sign up, simply select the Get Started! button to the top right 
            of the screen and select sign up, the following instructions will be detailed
            on the screen in the leftmost tab.
            </p>
         </div>
        </li>
        <li>
          <div class="collapsible-header">
            <i class="material-icons">accessibility</i>
            How in the name of Christ do I log in?
          </div>
          <div class="collapsible-body">
            <p>
            To Log in, simply select the Get Started! button to the top right 
            of the screen and select log in. This will take you to the login page 
            where you can type in your email address and password. You know, standard procedure,
            like.
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
          Of course! ask the bais in the back of the labs and I'd say they'll point you
          in the right direction, you know for a good price. I heard my buddy the other day 
          talk about some afghan kush he got from Amsterdam swear down it blew the box off me.
          Anyway I gotta go it's dinner time and me mam is making spaghetti hoops.
          </p>
        </div>
      </li>
      <li>
        <div class="collapsible-header">
          <i class="material-icons">assignment</i>
          How Do I Edit My Information?
          </div>
          <div class="collapsible-body">
          <p>
            To edit information, navigate to your profile page by selecting the drop
            down menu in the top right corner of your screen. Once the menu has dropped 
            select the dashboard option to navigate to your home page. Click on the red icon 
            to the right of the screen above which a message should display saying edit information.
          </p>
        </div>
      </li>
      <li>
        <div class="collapsible-header">
          <i class="material-icons">find_in_page</i>
          As a Venue, how will I be discovered? 
        </div>
        <div class="collapsible-body">
          <p>
          By being a pure dascent sound moth.
          </p>
        </div>
      </li>
    </ul>
    </section>

    <div class="divider"></div>

    <section>
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
