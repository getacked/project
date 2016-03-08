@extends('base')

@section('title')
  Search Events
@endsection


@section('content')
<div class="container row" id="events">
    <div class="col s12 m9">
      <h4 class="center-align">Search Events</h4>
    
      <div class="divider"></div>

      <div class="content row" id="content">
        
      <!-- EVENT INFO  -->
        <article class="item col s12 m6 l4" v-for="event in events">
      
            <div class="card">
              <div class="card-content">
                <span class="card-title">@{{{ event._highlightResult.name.value }}}</span>
                <p>@{{{ event._highlightResult.image_path.value }}}</p>
                <p>@{{{ event._highlightResult.alternative_name.value }}}</p>
              </div>
              <div class="card-action">
                <a class="right" href="/events/@{{ event.id }}">See More</a>
              </div>
            </div>
          
        </article>

      </div>

    </div>

    <div class="col hide-on-small-only m3">
      <div class="tabs-wrapper pinned search">
        <br>
        <br>

        <h5>SEARCH FOR EVENTS</h5>
        <!-- <form v-on:submit.prevent="search"> -->
          <input type="text" value="{{ $initialSearch }}" v-model="query" 
                v-on:keyup.enter="search" minlength="3" debounce="500" id="searchBox" >
         <!--  <div class="range-field">
            <input type="range" v-model="price" id="price" min="0" max="300" />
          </div> -->
        <!-- </form> -->
        
      </div>
    </div>

    <div id="map" style="display:none" ></div>
</div>
@stop


@section('scripts')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM&signed_in=true&libraries=geometry,places&callback=getAddresses" async defer></script>

<script src="http://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="http://cdn.jsdelivr.net/vue/1.0.17/vue.min.js"></script>
<!-- <script src="/js/vue.js"></script> -->

<script>
  $(document).ready(function(){
    $('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });
  });
</script>

<script>
Vue.config.debug = true;

new Vue({
  el: '#events',

  data: { events: [], query: '', price: '', },

  ready: function(){
    this.client = algoliasearch('DL6Q2SNWBH', '6ad40c1dee4b3dbe37af51a0c39b4d5a');
    this.index = this.client.initIndex('dev_events');

    $('#searchBox').typeahead({
        hint: false,
        highlight: true
      }, 
      {
        source:  this.index.ttAdapter(),
        displayKey: 'name'
      }).on('typeahead:select', function(e, suggestion){
        this.query = suggestion.name;
      }.bind(this));
  },

  methods: {
    search: function(){
      this.index.search( this.query, {
        // numericFilters: 'ticket_price>' . this.price
      }, function(err, content) {
       console.log(err, content)
       this.events = content.hits;
      }.bind(this));
    }
  }
  
});


</script>


@endsection
