@extends('base')


@section('styles')
  <link rel="stylesheet" href="/css/clockpicker.min.css" />
@stop

@section('content')
        
<div class="container">
  <br>
  <a class="btn-floating waves-effect waves-light" onclick="history.go(-1)">
    <i class="material-icons">undo</i>
  </a>
  <h2 class="center-align">Update Event</h2>

  
  @include('partials.errors')

  {{ Form::model($event, array('route' => array('events.update', $event), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

    <div class="input-field">
     {{ Form::text('name', $event->name, ['class' => 'validate col'] ) }}
     {{ Form::label('name', 'Event Name') }}
    </div>


    <div class="input-field">
      {{ Form::textarea('description', $event->description) }}
      {{ Form::label('description', 'Event Description')}}
    </div>

    <?php 
      $date = $event->event_time->format('d F, Y'); 

      $time = substr($event->event_time->toTimeString(), 0, 5);
      $types = array('music', 'comedy', 'conference', 'talk'); 
      $tags = \App\Tag::lists('name');

      $typeNo = 0;
      foreach( $types as $type ){
        if( $event->event_type == $type ){
          break;
        }
        $typeNo++;
      }
    ?>

   
    <div class="input-field">
      {{ Form::select('event_type', $types, $typeNo, ['class' => 'validate']) }}
      {{ Form::label('event_type', 'Type') }}
    </div>  
  

    <div class="input-field">

     <input name="event_date" type="date" value="{!! $date !!}" class="datepicker">
    </div>

    <div class="input-field clockpicker">
       <input type="text" class="form-control" name="event_time" value="{{ $time }}">
       {{ Form::label('event_time', "Time") }}
    </div>

    <div class="input-field">
     {{ Form::text('tickets', $event->ticket_cap ) }}
     {{ Form::label('tickets', 'Tickets') }}
    </div>

    <div> 

  
      <div class="input-field">
        {{ Form::select('tags[]', $tags, $event->tags()->lists('id')->toArray(), ['multiple', 'id' => 'tags']) }}
        {{ Form::label('tags', 'Tags') }}
      </div>

      <div>
        <h5>Or Create your own! <small>(seperated by commas)</small></h5>
        {{ Form::textarea('customTags') }}
      </div>
    </div>

    <div class="file-field input-field">
      <div class="btn">
        <span>Upload a photo for your event:</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    {{ Form::token() }}
    <br>
    <div class="center">
    <div class="gmaps-container">
      <input type="hidden" name="gmaps_id" id="gmaps" value="{{ $event->gmaps_id }}" />
      <input type="text" class="controls" id="pac-input" />
      <div id="map"></div>
      <img class="right" src="/images/powered_by_google_on_white.png" />
    </div>
    </div>
    {{ Form::submit('Update Event', ['class' => 'btn ']) }}
  {{ Form::close() }}
 
</div>

@stop


@section('scripts')
<script src="/js/clockpicker.min.js"></script>
<script>
$('select').material_select();
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done',
    autoclose: false

});
$('')
</script>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=initMap" async defer></script>

<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 51.8968, lng: -8.4863 },
    zoom: 12,
    scrollwheel: false
  });

  var geocoder = new google.maps.Geocoder;
  var infoWindow = new google.maps.InfoWindow({map: map});

  geocodePlaceId(geocoder, map, infoWindow);

//Set the default map view to the previous location
  function geocodePlaceId(geocoder, map, infowindow) {
    var placeId = $('#gmaps').attr("value");
    geocoder.geocode({'placeId': placeId}, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          map.setZoom(12);
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
          });
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });
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