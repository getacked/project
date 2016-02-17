@extends('base')

<!--Link for local video stylesheet-->
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">
@endsection

@section('pre-nav')
    <!--Landing page full screen video box-->
  <div class="homepage-hero-module">
    <div class="video-container">
      <div class="filter"></div>
@endsection

  <header>
    <div class="navbdar">
    
      <!--Drop down menu definition-->
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="register/">Sign Up!</a></li>
        <li><a href="login/">Login</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
      </ul>

      <nav id="navbar">
        <div class="nav-wrapper">

          <!--Left hand side nav-->
          <ul id="nav-mobile" class="left">
            <li class="nav-link"><a href="browse.html">Browse</a></li>

            <!--Search button box thing-->
            <li class="nav-link hide-on-med-and-down">
              <!--FORM MUST BE LINKED TO SOMETHING ON BACKEND-->
              <form action="#">
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

  @section('content')


  <div id="custom-message">
    <figure>
      <img class="responsive-img front-logo" src="images/logo2.png" alt="Eventure Logo">
    </figure>
    <p>
      <a href="#main">Plan your Adventure!</a>
    </p>
  </div>

  <div id="icons">
    <ul>
      <li>
        <a class="btn tooltipped floating btn-large waves-effect waves-light" data-position="right" data-delay="50" data-tooltip="Get Involved With Events">
        <i class="large material-icons">accessibility</i>
        </a>
      </li>
      <br>
      <li>
        <a class="btn tooltipped floating btn-large waves-effect waves-light" data-position="right" data-delay="50" data-tooltip="Organize &amp; Advertise Company events">
        <i class="large material-icons">announcement</i>
        </a>
      </li>
      <br>
      <li>
        <a class="btn tooltipped floating btn-large waves-effect waves-light" data-position="right" data-delay="50" data-tooltip="Advertise the Perfect Venue">
        <i class="large material-icons">account_balance</i>
        </a>
      </li>
  </div>

  <div id="jump-in"  class="center-align">
    <a href="#main"><i class="large material-icons">keyboard_arrow_down</i></a>
  </div>

  <div id="with-love">
    <p>
    Made with <i class="fa fa-heart heart-color red-text"></i> by us.
    </p>
  </div>

  <video autoplay loop class="fillWidth">
    <source src="videos/Cheer-Up.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
    <source src="videos/Cheer-Up.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
  </video>


  <!-- DEFAULT IMAGE IF NO VIDEO CAPABILITY  -->

  <div class="poster hidden">
    <img src="images/Cheer-Up.jpg">
  </div>

  </div>   
</div>  

<!--  END VIDEO CONTAINER -->


<div class="container">
  <section> 
    <h3 class="center-align">Some Upcoming Events</h3>
    <div class="divider"></div>
  
    <div class="row">
    
      @foreach($events as $event)
      
        @include('partials.event-card-small', $event)

      @endforeach
      
    </div>
  </section>

  <section>
    <div class="divider"></div>
    <div class="row">
      <h3 class="center-align">Why You Are Here</h3>
    </div>
    <div class="divider"></div>
    
    <div class="row center-align flow-text">
      <div class="col s12 m4">
        <i class="large material-icons">accessibility</i>
        <p>
          Create an account as an attendee to search for events, buy tickets
          and attend events that you like. Anytime, anywhere by type, tags and 
          location. 
        </p>
      </div>

      <!--Second column of text + logo-->
      <div class="col s12 m4">
        <i class="large material-icons">account_balance</i>
        <p>
          Organizer accounts allow you to create events, advertise the events and 
          link with venues that suit your needs by location, type and capacity.
        </p>
      </div>

      <!--Third column of text + logo-->
      <div class="col s12 m4">
          <i class="large material-icons">announcement</i>
          <p>
            Advertise your venue for that special someone for that special something. Get some new
            exciting business and clientèle that suit you to the foundations.
          </p>
        </div>
      </div>

      <div class="center">
          <a href="{{ url('register') }}" class="btn-large">
              Sign up now!
          </a>
      </div>
    </section>
  </div>
@endsection


<!-- VIDEO SCRIPT - covverr.com -->
@section('scripts')
    <script>
        $( document ).ready(function() {
                $(".dropdown-button").dropdown();
                $('.slider').slider({full_width: true});
                $('.parallax').parallax();
                
                //For fixed action buttons.
                $('.fixed-action-btn').openFAB();
                                
                //Javascript for video background
                scaleVideoContainer();

                initBannerVideoSize('.video-container .poster img');
                initBannerVideoSize('.video-container .filter');
                initBannerVideoSize('.video-container video');

                $(window).on('resize', function() {
                    scaleVideoContainer();
                    scaleBannerVideoSize('.video-container .poster img');
                    scaleBannerVideoSize('.video-container .filter');
                    scaleBannerVideoSize('.video-container video');
                });
            });

            function scaleVideoContainer() {
                var height = $(window).height() + 5;
                var unitHeight = parseInt(height) + 'px';
                $('.homepage-hero-module').css('height',unitHeight);
            }

            function initBannerVideoSize(element){

                $(element).each(function(){
                    $(this).data('height', $(this).height());
                    $(this).data('width', $(this).width());
                });

                scaleBannerVideoSize(element);

            }

            function scaleBannerVideoSize(element){

                var windowWidth = $(window).width(),
                windowHeight = $(window).height() + 5,
                videoWidth,
                videoHeight;

                console.log(windowHeight);

                $(element).each(function(){
                    var videoAspectRatio = $(this).data('height')/$(this).data('width');

                    $(this).width(windowWidth);

                    if(windowWidth < 1000){
                        videoHeight = windowHeight;
                        videoWidth = videoHeight / videoAspectRatio;
                        $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

                        $(this).width(videoWidth).height(videoHeight);
                    }

                    $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

                });
            });
    </script>
@endsection 
