@extends('base')

@section('title')
  Browse Events
@endsection


@section('content')
<div class="container row">
    <div class="col s12 m9">
      <h4 class="center-align">Look At This Shit</h4>
      <div class="divider"></div>
      <div class="row">
        @foreach( $events as $event )
          @include('partials.event-card', $event)
        @endforeach
      </div>
      <div class="row">
        <div class="center-align">
          <a href="{{ route('events.create') }}">
            <i class="material-icons large">add_to_queue</i>
          </a>
        </div>
      </div>
    </div>

    <div class="col hide-on-small-only m3">
      <div class="tabs-wrapper pinned">
        <br>
        <br>
        MENU
        <!--Implement some kind of search form here, would be lovely :) -->
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