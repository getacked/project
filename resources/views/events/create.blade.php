@extends('base')

@section('title')
Create Event
@stop


@section('styles')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop


@section('content')

<div class="flow-text container">
  <h2 class="center"> Create an Event!</h2>
  <p>
    You're so close to creating your very own event! Just a few details about the event and you'll be ready to share with friends, sell tickets and get stuck in to your own Eventure.  
  </p>
  <div class="divider"></div>

{{ Form::open(array('route' => 'events.store', 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
  
  <section class="event-form">
    <h5 class="center-align">1 - Main Details</h5>
    <p class="center-align">
      Tell us what you're made of
    </p>
    <div class="input-field">
      {{ Form::text('name', null, ['class' => 'validate col'] ) }}
      {{ Form::label('name', 'Event Name') }}
    </div>

    <?php 
      $types = ['music' => 'music', 'comedy' => 'comedy', 'conference' => 'conference', 'talk' => 'talk']; 
    ?>

    <div class="input-field">
      {{ Form::select('event_type', $types, null, ['class' => 'validate']) }}
      {{ Form::label('event_type', 'Event Type') }}
    </div>  

    <div class="input-field">
      {{ Form::textarea('description', null, array('placeholder' => 'Enter Your Event Description', 'class' => 'materialize-textarea')) }}
    </div>

    <span class="center"></span>

    <h5 class="center-align">2 - Choose a location for your event!</h5>
    <p class="center-align">
      So people won't end up lost in a library somewhere.
    </p>

    <div class="gmaps-container">
      <input type="hidden" name="gmaps_id" id="gmaps"/>
      <input type="text" class="controls" id="pac-input" />
      <div id="map"></div>
      <img class="right" src="/images/powered_by_google_on_white.png" />
    </div>
  </section>
  
  <section class="event-form">
    <h5 class="center-align">2 - Ticket Information</h5>
    <p class="center-align">
      For those wishing to make a shiny penny. Enter price at €0.00 for a free-for-all!  </p>  
    <div class="input-field">
      {{ Form::text('ticket_price') }}
      {{ Form::label('ticket_price', 'Ticket Price  (0 for no charge)') }}
    </div>

    <div class="input-field">
      <input name="event_date" type="date" class="datepicker" placeholder="Choose the Date of Your Event">
    </div>
    <div class="input-field clockpicker">
       <input type="text" class="form-control" name="event_time">
       {{ Form::label('event_time', "Choose a time for your event") }}
    </div>

    <div class="input-field">
      {{ Form::text('ticket_cap') }}
      {{ Form::label('ticket_cap', 'Tickets') }}
    </div>
  </section>


  <section class="event-form row"> 
    <h5 class="center-align">3 - Add Some Event Tags!</h5>
    <p class="center-align">
      This will allow other users to find your event based on what they like.
    </p>

    <div class="row item input-field">
      {{ Form::select('tags[]', $tags, null, ['multiple']) }}
      {{ Form::label('tags', 'Tags') }}
    </div>

    <div class="row item input-field">
      <!-- <p class="center-align">Or Create your own! <small>(seperated by commas)</small></p> -->
      {{ Form::textarea('customTags', null, array('class' => 'materialize-textarea')) }}
      {{ Form::label('customTags', 'Or Create your own! (Seperated by commas)') }}
    </div>
  </section>

  <div class="file-field input-field">
    <div class="btn">
      <span>Upload a photo for your event</span>
      <input type="file" name="image">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text">
    </div>
  </div>


  <br>
  <div class="center-align">
  {{ Form::submit('Create Event!', ['class' => 'btn-large']) }}
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

}
</script>

@stop