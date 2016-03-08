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
      <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header">
                 <i class="material-icons">account_box</i>
                 How Do I Sign Up?
                </div>
                <div class="collapsible-body">
                  <p>
                  To sign up, simply select the Get Started! button to the top right
                  of the screen and select sign up. Select whether you will be an attendee
                  or an organizer and enter a few details about yourself. Then scroll to the bottom
                  of the screen to the 'Create Your Account' button and select to create your account.
                  </p>
               </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <i class="material-icons">accessibility</i>
                  How Do I Log In?
                </div>
                <div class="collapsible-body">
                  <p>
                  To Log in, simply select the Get Started! button to the top right
                  of the screen and select log in. This will take you to the login page
                  where you can type in your email address and password.
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
                  To edit information, navigate to your dashboard page by selecting the drop
                  down menu in the top right corner of your screen. Once the menu has dropped
                  select the dashboard option to navigate to your home page. Click on the red icon
                  to the right of the screen above which a message should display saying edit information.
                </p>
              </div>
            </li>
            <li>
              <div class="collapsible-header">
                <i class="material-icons">find_replace</i>
                How Can I Find an Event?
              </div>
              <div class="collapsible-body">
                <p>
                To find an event just select the drop down menu in the top right of the screen.
                Once here select the browse button where you will be brought to another page displaying
                a few sample events. Use the search options to the right of the screen to filter the events
                by key words.
                </p>
              </div>
            </li>
             <li>
              <div class="collapsible-header">
                <i class="material-icons">explore</i>
                How Can I Navigate to an Event?
              </div>
              <div class="collapsible-body">
                <p>
                To navigate to an event, first find the event using the browse button (see above)
                Once you have found your event, click on the event image and more information should display
                click 'see more', this will bring you to the event page. Once here there is a drop down menu called
                'where?'. Select this option and you will see a map. The event location will be displayed on the map.
                </p>
              </div>
            </li>
            <li>
              <div class="collapsible-header">
                <i class="material-icons">motorcycle</i>
                How Can I Get Directions to an Event?
              </div>
              <div class="collapsible-body">
                <p>
                Once you have found the map to the event (see above), you may be allowed to get directions to the event.
                To do this first click 'view on larger map', while looking at the map in the event page on your screen.
                This will bring you to another page where there is a 'directions' option that you may press to the left of the
                screen. Fill in the location from which you would like to get directions and Google will do the rest!
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
      <a href="{{ route('contact') }}" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>Contact Page</a>
      <p class="flowtext">
      You never know there may be others out there with the same question so push the boat, be all that you can be, ask the question
      and help your fellow humans! 
      </p>
    </section>
  </div>

@endsection
