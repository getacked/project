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


  <div id="custom-message">
    <figure>
      <img class="responsive-img front-logo" src="images/logo2.png" alt="Eventure Logo">
    </figure>
    <p>
      <a href="#main">Plan your Adventure!</a>
    </p>
  </div>



  <div id="jump-in"  class="center-align">
    <a href="#jump"><i class="large material-icons">keyboard_arrow_down</i></a>
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

<!--  END VIDEO CONTAINER -->


<div class="container row" id="jump">
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

  <div id="map" style="display:none" ></div>
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
}
</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>


<script>

function getAddresses(){
 var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 51.8962, lng: -8.7200},
    zoom: 12
  });

  var service = new google.maps.places.PlacesService(map);

//get placeIds of suggested events
  var placeIds = {!! $events->lists('gmaps_id')->toJSON() !!};

  for( i = 0; i < placeIds.length; i++ ){
    fillAddressDetails(service, placeIds[i]);
  }

  function fillAddressDetails(service, id){
    service.getDetails({
       placeId: id
     }, function(place, status) {
       if (status === google.maps.places.PlacesServiceStatus.OK) {
          $("#".concat(id)).html('<b>' + place.name + '</b><br><i>' + place.formatted_address + '</i>');
       }
     });
  }    
}

</script>


@endsection
