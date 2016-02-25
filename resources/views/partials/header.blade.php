<header>
  <div class="navbar-fixed">

    @if( Auth::check() )
      <ul id="user-dropdown" class="dropdown-content">
          <li><a href="{{ route('dashboard', Auth::user()->id) }}">Dashboard</a></li>
          <li><a href="{{ route('events.create') }}">Create Event</a></li>
          <li><a href="{{ route('landing') }}">Home</a></li>
          <li><a href="{{ route('browse') }}">Browse Events</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/logout') }}">Logout</a></li>
      </ul>
    @endif

    <ul id="guest-dropdown" class="dropdown-content">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="{{ url('/login') }}">Log In</a></li>
        <li><a href="{{ url('/register') }}">Sign Up!</a></li>
        <li><a href="{{ route('browse') }}">Browse Events</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
    </ul>


    <nav>
      <div class="nav-wrapper">

      <!--Main logo and site name, centrally aligned EXCLUDED FROM LANDING PAGE-->
      <a href="{{ route('landing') }}" class="brand-logo center hide-on-small-only">Eventure</a>

        <!--Left hand side nav-->
        <ul id="nav-mobile" class="left hide-on-small-only    ">
          <li class="nav-link">{{ link_to_route('browse', 'Browse') }}</li>

          <!--Search button box thing-->
          <li class="nav-link">
            <form>   <!-- NEEDS TO DO SOMETHING -->
              <div class="input-field">
                <input id="search" type="search" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </li>
        </ul>


        <!--Right hand side nav-->
        <ul id="nav-mobile" class="right">
         @if( Auth::check() )
           <li>
            <a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="user-dropdown">
              <img src="http://lorempixel.com/800/800/" alt="" class="account-pic circle responsive-img" />
              {{ Auth::user()->username }}
                <i class="material-icons right">arrow_drop_down</i>
            </a>
           </li>
         @else 
           <li>
             <a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="guest-dropdown">Get Started!<i class="material-icons right">arrow_drop_down</i></a>
           </li>
         @endif
        </ul>
      </div>
    </nav>
  </div>
</header>