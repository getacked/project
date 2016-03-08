@extends('base')

@section('title')
Browse
@endsection


@section('javascript')
$( document ).ready(function() {
  $('select').material_select();
});
@endsection

@section('content')

    <div class="container">
      <h4>Browse Events Below</h4>
      <p>
        Search For Events Below With Any or All Parameters You Need!
      </p>
      <div class="row">
        <div class="divider col s6"></div>
      </div>
      <section>
      
        <form action="#">
        <ul class="collapsible" data-collapsible="expandable">
        <li>
          <div class="collapsible-header">
          Name
          </div>
          <div class="collapsible-body">
            <div class="row">
            <div class="input-field col s10 center-align">
                <i class="material-icons prefix">account_circle</i>
                <input placeholder="Event Name;">
              </div>
          </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
          Location
          </div>
          <div class="collapsible-body">
            <div class="row">
            <div class="input-field col s10 center-align">
                <i class="material-icons prefix">account_circle</i>
                <input placeholder="Event Location;">
              </div>
          </div>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
          Event Tags
          </div>
          <div class="collapsible-body" >
            <p>
            Select One or Multiple tags you wish to search by.
            </p>
            <div class="row" id="selection_box_search_page">
              @foreach( $interests as $tag )
              <div class="col s6 m3">
                <input type="checkbox" id="{{$tag.name}}" />
                <label for="{{$tag.name}}">{{$tag.name}}</label>
              </div>
            @endforeach
          
            </div>
          </div>
        </li>
        </ul>
        <input type="submit" value="Show Me Those Events." class="btn"/>
        </form>
      
        <!--Should Only Return Events appropriate to request parameters.-->
      
    @if(count($events) > 0)
      <section>
        <h5 class="center-align">Here's What We Found For You!</h5>
        <div class="divider"></div>
        <div class="row">
        @foreach($events as $event)
          <div class="col s6 m4 l3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
          
          <!--Have a look at this-->
            <img class="activator" src=" 
            @if(isset $event.image )
              {{$event.image}}{{ $event.image.extension}} 
            @else 
              default.jpg 
            @endif"/> 
            </div>
            <div class="card-content">
            <span class="card-title activator grey-text text-darken-4 truncate">{{$event.name}}</span>
            <p>{{$event.time}} : {{event.date}}</p>
            </div>
            <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">Contact Info<i class="material-icons right">close</i></span>
            <p>We're lonely, please contact us.</p>
            <!-- Icon FB-->
            <a href="https://www.facebook.com/fionn.o.connor" target="_blank"><img src="http://www.niftybuttons.com/scribble/facebook.png" border="0" margin="1px"></a>
            <!-- Icon twitter-->
            <a href="https://twitter.com/charliesheen" target="_blank"><img src="http://www.niftybuttons.com/scribble/twitter.png" border="0" margin="1px"></a>
            <!-- Icon G+-->
            <a href="https://plus.google.com/+DerekBridgeGooglePlus" target="_blank"><img src="http://www.niftybuttons.com/scribble/google.png" border="0" margin="1px"></a>
            </div>
          </div>
          </div>
          @endforeach
        
        </div>
        </section>
      
    @else
      <section>
        <h5 class="center-align">Woops! It appears we didn't find what you were looking for.</h5>
        <p class="center-align">
        It could be that there are no events today that suit. Try making your search parameters more general 
        or call back tomorrow and hopefully we'll have something nice for you!
        </p>
      </section>
    @endif
      </section>
    </div> 

@endsection