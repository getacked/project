@extends('base')

@section('title')
  Browse Events
@endsection


@section('content')
<div class="container row">
    <div class="col s12 m9">
      <h4 class="center-align">Look At This Shit</h4>
    
      <div class="divider"></div>

      <section>
        <div class="row results" id="results">
          
          <article v-repeat="event: events">
          
            <h2>gg</h2>
          
          </article>

        </div>
      </section>

      
    </div>

    <div class="col hide-on-small-only m3">
      <div class="tabs-wrapper pinned search">
        <br>
        <br>

        <h5>SEARCH OPTIONS</h5>
        <input type="text" value="{{ $initialSearch }}" v-model="query"  id="searchBox" >
     
      </div>
    </div>

    <div id="map" style="display:none" ></div>
</div>
@stop


@section('scripts')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>
<script src="http://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="http://cdn.jsdelivr.net/vue/1.0.17/vue.min.js"></script>

<script>
  $(document).ready(function(){
    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
    document.getElementById('results').onkeypress=function(e){
      var key = String.fromCharCode( e.which | e.keyCode );
      if (key==13){
         searching();
      }
    };
  });

  function searching(){
    var client = algoliasearch("DL6Q2SNWBH", "6ad40c1dee4b3dbe37af51a0c39b4d5a");
    var index = client.initIndex('getstarted_actors');

    console.log("ready");

    index.search("{{ $initialSearch }}", function(error, results){
      if(error){
        console.log(error);
      }

      events = results.hits;
      console.log(results.hits);
    });

    return false;
  }

</script>


<script>

// new Vue({
//   el: 'section',

//   data: { query: '', events: [] },

//   ready: function(){
//     this.client = algoliasearch("DL6Q2SNWBH", "6ad40c1dee4b3dbe37af51a0c39b4d5a");
//     this.index = this.client.initIndex('getstarted_actors');
//     console.log("ready");
//     if ( {{ strlen($initialSearch) }} > 0 ){
//       this.index.search("{{ $initialSearch }}", function(error, results){

//         if(error){
//           console.log(error);
//         }
//         this.events = results.hits;
//         console.log(results.hits);
//       });
//     }
//   },

//   methods: {
//     search: function(){
//       console.log("whyyyy");
//       this.index.search(this.query, function(error, results){
//         this.events = results.hits;
//         console.log("searched");
//       }.bind(this));
//     }
//   }
  
// });

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