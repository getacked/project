@extends('base')

@section('title')
FUCK
@stop


@section('styles')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop


@section('content')

<div class="container">
<h2 class="center"> Create an Event! </h2>

{{ Form::open(array('route' => 'events.store', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}

  <div class="input-field">
    {{ Form::text('name', null, ['class' => 'validate col'] ) }}
    {{ Form::label('name', 'Event Name') }}
  </div>

  <?php 
    $types = ['music', 'comedy', 'conference', 'talk']; 
  ?>

  <div class="input-field">
    {{ Form::select('type', $types, null, ['class' => 'validate']) }}
    {{ Form::label('type', 'Type') }}
  </div>  

  <div class="input-field">
    {{ Form::textarea('description') }}
    {{ Form::label('description', 'Event Description')}}
  </div>
  
  <div class="input-field">
    <input name="event_date" type="date" class="datepicker">
    {{ Form::label('event_date', "Date") }}
  </div>
  <div class="input-field clockpicker">
     <input type="text" class="form-control" name="event_time" value="18:00">
     {{ Form::label('event_time', "Time") }}
  </div>

  <div class="input-field">
    {{ Form::text('ticket_cap') }}
    {{ Form::label('ticket_cap', 'Tickets') }}
  </div>

  <div> 
    <div class="input-field">
      {{ Form::select('tags[]', $tags, null, ['multiple']) }}
      {{ Form::label('tags', 'Tags') }}
    </div>

    <div>
      <h3>Or Create your own! <small>(seperated by commas)</small></h3>
      {{ Form::textarea('customTags') }}
    </div>

  </div>


<!--   <div class="input-field">
      {!! Form::label('Event Image') !!}
      {!! Form::file('image', null) !!}
  </div> -->

  <div class="file-field input-field">
    <div class="btn">
      <span>Upload a photo for your event:</span>
      <input type="file" name="image">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text">
    </div>
  </div>

  <div class="gmaps-container">
    <input type="hidden" name="gmaps_id" id="gmaps"/>
    <input type="text" class="controls" id="pac-input" />
    <div id="map"></div>
    <img class="right" src="/images/powered_by_google_on_white.png" />
  </div>


  {{ Form::submit('Sign up!', ['class' => 'btn']) }}

  {{ Form::close() }}

  @include('partials.errors')
</div>

@stop

@section('scripts')
<script src="/js/clockpicker.min.js"></script>
<script>
  $(document).ready(function() {
    $('select').material_select();
    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Done',
        autoclose: true
    });
  });
</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=initMap" async defer></script>

<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 51.8972, lng: -8.7200},
    zoom: 12,
    scrollwheel: false
  });

  // var infoWindow = new google.maps.InfoWindow({map: map});

    // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }


  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
  }

  var input = /** @type {!HTMLInputElement} */(
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(14);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
    $("#gmaps").attr("value", place.place_id);

    // $("#gmaps").attr("yellow");

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}
</script>

@stop