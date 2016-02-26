@extends('base')

@section('title')
Create Event
@stop


@section('styles')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop


@section('content')

<div class="container">
<h2 class="center"> Create an Event!</h2>
<p>
You're so close to creating your very own event! Just a few details about
the event and you'll be ready to share with friends, sell tickets and 
get stuck in to your own Eventure&copy;.  
</p>
<div class="divider"></div>
{{ Form::open(array('route' => 'events.store', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
  
  <p class="flowtext"></p>
  <h5 class="center-align">1 - Main Details</h5>
  <p class="center-align">
    Tell us what you're made of
  </p>
  <div class="input-field">
    {{ Form::text('name', null, ['class' => 'validate col'] ) }}
    {{ Form::label('name', 'Event Name') }}
  </div>

  <?php 
    $types = ['music', 'comedy', 'conference', 'talk']; 
  ?>

  <div class="input-field">
    {{ Form::select('type', $types, null, ['class' => 'validate']) }}
    {{ Form::label('type', 'Event Type') }}
  </div>  

  <div class="input-field">
    {{ Form::textarea('description', null, array('placeholder' => 'Enter Your Event Description')) }}
  </div>
  
  <h5 class="center-align">2 - Ticket Information</h5>
  <p class="center-align">
    For those wishing to make a shiny penny (of course this is optional)
  </p>  
  <div class="input-field">
    {{ Form::text('price'), 0 }}
    {{ Form::label('price', 'Enter Price') }}
  </div>

  <div class="input-field">
    <input name="event_date" type="date" class="datepicker">
    {{ Form::label('event_date', "Date") }}
  </div>
  <div class="input-field clockpicker">
     <input type="text" class="form-control" name="event_time">
     {{ Form::label('event_time', "Time") }}
  </div>

  <div class="input-field">
    {{ Form::text('ticket_cap') }}
    {{ Form::label('ticket_cap', 'Tickets') }}
  </div>

  <h5 class="center-align">3 - Add Some Event Tags!</h5>
  <p class="center-align">
    This will allow other users to find your event
  </p>

  <div> 
     
    <div class="input-field">
      {{ Form::select('tags[]', $tags, null, ['multiple']) }}
      {{ Form::label('tags', 'Tags') }}
    </div>

    <div>
      <p class="center-align">Or Create your own! <small>(seperated by commas)</small></p>
      {{ Form::textarea('customTags') }}
    </div>

  </div>
  <br>
<!--   <div class="input-field">
      {!! Form::label('Event Image') !!}
      {!! Form::file('image', null) !!}
  </div> -->

  <div class="file-field input-field row">
    <div class="btn col s12">
      <span>Upload a photo for your event:</span>
      <input type="file" name="image">
    </div>
    <div class="file-path-wrapper col s12">
      <input class="file-path validate" type="text">
    </div>
  </div>

  <div class="gmaps-container">
    <input type="hidden" name="gmaps_id" id="gmaps"/>
    <input type="text" class="controls" id="pac-input" />
    <div id="map"></div>
    <img class="right" src="/images/powered_by_google_on_white.png" />
  </div>
  <br>
  <div class="center-align">
  {{ Form::submit('Create Event!', ['class' => 'btn']) }}
  </div>
  {{ Form::close() }}

</div>

@include('partials.errors')

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