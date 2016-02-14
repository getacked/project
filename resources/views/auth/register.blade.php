@extends('base')

@section('title')
Sign Up
@endsection


@section('content')

    
      <div class="row">
      <div class="col s12">
      <ul class="tabs">
      <li class="tab col s3"><a href="#howto" class="active">How To Sign Up</a></li>
      <li class="tab col s3"><a href="#attendee">Attendee</a></li>
      <li class="tab col s3"><a href="#venue">Venue</a></li>
      </ul>
      </div>
    </div>
    <div class="container">
      <div id="howto" class="col s12">
        <section>
          <h4>Fancy Getting Involved? Of Course You Do. Here's How</h4>
          <p class="flowtext">
        With Eventure we have two separate sign up forms for users
         &amp; venues. So are you the eagerly awaiting concert goer that's looking
        for the next big thrill? Religious enthusiast that just can't get enough of those pilgrimages?
        Do you want to celebrate your special day and want everyone to come along? Or do you simply have the
        perfect venue for that something that someone may be planning? Well have we a nice surprise for you!
        <br>
        As a user you will be allowed to search for events near you based on interests that you may have, 
        view past events, get content from past events and much much more! You're also entitled to networking 
        with venues and with the help of a user database create events, network and sell tickets all in one place. Venues 
        have the opportunity to network with organizers and advertise their venue to cater for events most suitable to the 
        organizer.
        </p>
        <br>
        <h5>Getting down to it.</h5>
        <p class="flowtext">
        We know you're eager to sign up so once you've decided what kind of user you want to be just click on the tabs 
        above that attains to you and after a few bits of information that we will need to create a nice tailored experience 
        you'll be on your way to your first Eventure! Get excited people.
        </p>
        </section>
      <div class="row">
        <div class = "col s4">
          <div class="divider"></div>
        </div>
        <div class = "col s4">
          <div class="divider"></div>
        </div>
        <div class = "col s4">
          <div class="divider"></div>
        </div>
      </div>
      </div>
      <div id="attendee" class="col s12">
        <section>
        <section>
            <h4>User Sign Up.</h4>
            <p>First just a few details about you - because we think you're cool and want to know you better.</p>
          </section>

        {{ Form::open(array('url' => '/register', 'method' => 'POST')) }}

          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              {{ Form::text('first_name',  old('first_name'), ['class' => 'validate'] ) }}
              {{ Form::label('first_name', 'First Name') }}
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">assignment_ind</i>
              {{ Form::text('last_name',  old('last_name'), ['class' => 'validate'] ) }}
              {{ Form::label('last_name', 'Surname') }}
            </div>
          </div>

          <div class="input-field">
            {{ Form::text('username',  old('username'), ['class' => 'validate col'] ) }}
            {{ Form::label('username', 'Username') }}
          </div>

          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              {{ Form::email('email', old('email'), ['class' => 'validate'] ) }}
              {{ Form::label('email', 'Email') }}
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>             
              {{ Form::text('tel_no',  old('tel_no'), ['class' => 'validate'] ) }}
              {{ Form::label('tel_no', 'Telephone Number: (optional)') }}
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


          <div>
            <p> So would you like to organize events or attend events? Select your option below!</p>
            <p>
              {{ Form::radio('type', '0', 'true', array('id' => 'regular', 'class' => 'with-gap') )  }}
              {{ Form::label('regular', 'Attendee') }}
            </p>
            <p>
              {{ Form::radio('type', '1', 'false', array('id' => 'host', 'class' => 'with-gap') )  }}
              {{ Form::label('host', 'Host') }}
            </p>
          </div>

          <div class="row">
            <p>
              Now Just for a few interests and we'll have your brand new profile ready for you in just a few minutes!.
            </p>
          </div>
          <div class="row">
            <!-- Foreach tags  -->
          </div>

          {{ Form::submit('Create your account!', ['class' => 'btn']) }}
            
        {{ Form::close() }}

        @include('partials.errors')

      </section>
      </div>
      <div id="venue" class="col s12">
      <section>
        <section>
          <h4>Venue Sign Up.</h4>
          <p>Have a nice venue you want to advertise? Do it here by entering a few pieces of information.</p>
        </section>
        <form class="col s12" action="#">
          <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">perm_identity</i>
            <input id="fname" type="text" class="validate">
            <label for="fname">First Name:</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Telephone (Optional):</label>
            </div>
          </div>
          <div class="col s3">
          <input type="submit" value="Login" class="btn"/>
          </div>
        </form>
      </section>
      </div>      
    </div>
@endsection   