@extends('base')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row">
	<div class="col s12">
		<ul class="tabs">
			<li class="tab col s3"><a href="#dashboard" class="active">Dashboard</a></li>
			<li class="tab col s3"><a href="#past">My Past Events</a></li>
		</ul>
	</div>
 </div>
 
 <div class="container">

  <?php 

    $hostEvents = Auth::user()->events()->upcoming();

  ?>

	@include('users.dashboard.tabs.landing-organiser')
  
	@include('users.dashboard.tabs.past')

  </div>
@stop

@section('scripts')


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>


<script>

function getAddresses(){
 var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 51.8962, lng: -8.7200},
    zoom: 12
  });

  var service = new google.maps.places.PlacesService(map);

//get placeIds of suggested events
  var placeIds = {!! $hostEvents->lists('gmaps_id')->toJSON() !!};

  for( i = 0; i < placeIds.length; i++ ){
    fillAddressDetails(service, placeIds[i]);
  }

  function fillAddressDetails(service, id){
    service.getDetails({
       placeId: id
     }, function(place, status) {
       if (status === google.maps.places.PlacesServiceStatus.OK) {
          $("#".concat(id)).html('<i>' + place.formatted_address + '</i>');
          $("#place-".concat(id)).html('<em>' + place.name + '</em>');
       }
     });
  }    
}

</script>
@stop