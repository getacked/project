@extends('base')

@section('title')
  Browse Events
@endsection


@section('content')
<div class="container row" id="events">
    <div class="col s12 m9">
      <h4 class="center-align">Look At This Shit</h4>
    
      <div class="divider"></div>

      <section class="row">
        <div class="content" id="content">
          
          <article v-for="event in events">
          
            <div class="col s12 m6 l4">
              <div class="card item">
                <div class="card-image waves-effect waves-block waves-light">
                  Some Image                  
                </div>
                
                <div class="card-content">
                
                <span class="card-title activator grey-text text-darken-4"><span class="truncate">@{{{ event._highlightResult.name.value }}}</span><br><small>by @{{ event.host }}</small><i class="material-icons right">more_vert</i></span>
                  <p><strong>@{{ event.event_time }}</strong></p>
                  <p id="place-@{{ event.gmaps_id }}"></p>
                </div>
              
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">@{{ event.name}}: <br><small>by @{{ event.host }}</small><i class="material-icons right">close</i></span>

                  <p class="card-address" id="@{{ event.gmaps_id }}"></p>
                  <p>@{{ event.description }}</p>

                  <br>
                  <p><em>@{{ event.event_time }}</em></p>

                  <small><a href="">See More</a></small>
                </div>
              </div>
            </div>
          
          </article>

        </div>
      </section>

      
    </div>

    <div class="col hide-on-small-only m3">
      <div class="tabs-wrapper pinned search">
        <br>
        <br>

        <h5>SEARCH OPTIONS</h5>
        <!-- <form v-on:submit.prevent="search"> -->
          <input type="text" value="{{ $initialSearch }}" v-model="query" 
                v-on:keyup.enter="search" id="searchBox" >
        <!-- </form> -->
        
      </div>
    </div>

    <div id="map" style="display:none" ></div>
</div>
@stop


@section('scripts')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>

<script src="http://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<!-- <script src="http://cdn.jsdelivr.net/vue/1.0.17/vue.min.js"></script> -->
<script src="/js/vue.js"></script>

<script>
  $(document).ready(function(){
    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
  });
</script>

<script>
Vue.config.debug = true;

new Vue({
  el: '#events',

  data: { events: [], query: ''},

  ready: function(){
    this.client = algoliasearch('DL6Q2SNWBH', '6ad40c1dee4b3dbe37af51a0c39b4d5a');
    this.index = this.client.initIndex('events');
  },

  methods: {
    search: function(){
      this.index.search( this.query, function(err, content) {
       console.log(err, content)
       this.events = content.hits;
      }.bind(this));
    }
  }
  
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