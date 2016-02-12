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


@section('content')

  <header>
    <div class="navbar">
    
      <!--Drop down menu definition-->
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="sign_up.html">Sign Up!</a></li>
        <li><a href="login.html">Login</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="about.html">About Us</a></li>
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
        <a class="btn tooltipped floating btn-large waves-effect waves-light" data-position="right" data-delay="50" data-tooltip="Organize & Advertise Company events">
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

  <div class="poster hidden">
    <img src="images/Cheer-Up.jpg">
  </div>

    </div>   
  </div>  <!--  END VIDEO CONTAINER -->


    <div class="container">
      <section>
      <!--Heading-->
        <div class="row">     
          <h3 class="center-align">Some Upcoming Events</h3>
        </div>

      <div class="divider"></div>
      
     
        <div class="row">
        
          @foreach($events as $event)
          <div class="col s6 m4 l3">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                @if($event->image)   
                  <?php
                      $path = App\Image::find($image)->fileName;
                  ?>
                   <img class="activator" src="/images/{{ $path }}" />
                @else 
                    <!-- <img class="activator" src="images/default.jpg" /> -->
                    <img class="activator" src="http://lorempixel.com/840/500" />
                @endif
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4 truncate">{{ $event->name }}</span>
                <p>{{ $event->event_time->diffForHumans() }}</p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{ $event->name }}<i class="material-icons right">close</i></span>
                <small>at {{$event->location }}</small>
                <p>
                  {{ $event->description }}
                </p>
                <a href="{{ route('events.show', $event) }}">See More</a>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
      </section>

      <section>
        <div class="divider"></div>
      
        <!--Heading-->
        <div class="row">
          <h3 class="center-align">Why You Are Here</h3>
        </div>

        <div class="divider"></div>
        
        <div class = "row">
          <!--First column of text + logo-->
          <div class="col s12 m4">
            <div class="center-align">
              <i class="large material-icons">accessibility</i>
            </div>
            <p class ="flow-text">
              Create an account as an attendee to search for events, buy tickets
              and attend events that you like. Anytime, anywhere by type, tags and 
              location. 
            </p>
          </div>

          <!--Second column of text + logo-->
          <div class="col s12 m4">
            <div class="center-align">
              <i class="large material-icons">account_balance</i>
            </div>
            <p class ="flow-text">
              Organizer accounts allow you to create events, advertise the events and 
              link with venues that suit your needs by location, type and capacity.
            </p>
          </div>

          <!--Third column of text + logo-->
          <div class="col s12 m4">
            <div class="center-align">
              <i class="large material-icons">announcement</i>
            </div>
            <p class ="flow-text">
              Advertise your venue for that special someone for that special something. Get some new
              exciting business and clientèle that suit you to the foundations.
            </p>
          </div>
        </div>
        <div>
            <a href="{{ url('register') }}" class="btn">
                Sign up now!
            </a>
        </div>
      </div>
@endsection


<!--JavaShi(p)t-->
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
