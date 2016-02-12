<header>
  <div class="navbar-fixed">

    <!--Drop down menu definition-->
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="index.html">Home</a></li>
    <li><a href="{{ url('/register') }}">Sign Up!</a></li>
    <li class="divider"></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
    <li><a href="{{ route('faq') }}">FAQ</a></li>
    <li><a href="about.html">About Us</a></li>
    </ul>

    <nav>
      <div class="nav-wrapper">

      <!--Main logo and site name, centrally aligned EXCLUDED FROM LANDING PAGE-->
      <a href="{{ route('landing') }}" class="brand-logo center">Eventure</a>

      <!--Left hand side nav-->
      <ul id="nav-mobile" class="left">
        <li class="nav-link"><a href="browse.html">Browse</a></li>

      <!--Search button box thing-->
      <li class="nav-link">
        <form>
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
        <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1">Get Started!<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      </div>
    </nav>
  </div>
</header>