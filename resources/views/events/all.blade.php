@extends('base')

@section('title')
  Browse Events
@endsection


@section('content')
<div class="container row" id="events">
    <div class="col s12 m9 l8">
      <h4 class="center-align">All Upcoming Events</h4>
    
      <div class="divider"></div>

      <div class="content row" id="content">
        
        @foreach( $events as $event )
          @include('partials.event-card-small')
        @endforeach

      </div>

    </div>

    <div class="col hide-on-small-only offset-m1 offset-l2 m2">
      <div class="tabs-wrapper pinned search">
        <br>
        <br>

        <h4>Wanna get specific?</h4>
        <a href="{{ route('events.searchPage') }}">Search</a>
        
      </div>
    </div>

    <div id="map" style="display:none" ></div>
</div>
@stop


@section('scripts')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>

<script>
  $(document).ready(function(){
    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
  });
</script>

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