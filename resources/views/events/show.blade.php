@extends('base')

@section('title')
{{ $event->name }}
@endsection

@section('content')

  <div class="container">
    <section>
      <figure>
        @if($event->photo)   
           <?php
               $photo = $event->photo;
               $path = $photo->fileName . $photo->mime;
           ?>
            <img alt="{{ $event->name }} image" class="responsive-img center-block"  src="/images/uploads/{!! $path !!}" />
        @else 
            <img alt="{{ $event->name }} image" class="responsive-img center-block" src="http://lorempixel.com/1000/480" />
        @endif
      </figure>

      <div class="divider"></div>
      <h4 class="center-align">{{$event->name}}</h4>
      <h5 class="center-align">by <a href="{{ route('dashboard', $event->host) }}">{{ $event->host->username }}</a></h5>
          <div class="center-align">
            <em>{{ $event->event_time->diffForHumans() }}</em>
          <p class="center-align">Tickets left: {{ $event->ticket_left }} at {{ $event->ticket_price }}</p>
            <?php
              if( $event->host == Auth::user() ){
                echo "<a href='" . route('events.edit', $event)."'>";
                echo "<p class='chip'>Edit event <i class='material-icons'>mode_edit</i></p></a>";
              }else{
                if( !$event->attendees->contains(Auth::user()) && Auth::check() && $event->ticket_left > 0){
                  echo Form::open(array('route' => array('events.attend', $event), 'method' => 'POST', 'id' => 'attend'));
                    echo "<button value='submit' type='submit' class='btn-large' id='attendButton'>Attend!</button>"; 
                    echo '<input type="hidden" name="stripeToken" id="token"/>';
                    echo '<input type="hidden" name="stripeEmail" id="email"/>';

                  echo Form::close();
                }
              }
            ?>
          
          </div>
      <br>
    <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <h5>About Event</h5>
            </div>
            <div class="collapsible-body">
              <table class="centered highlight">
                <tbody>
                  <tr>
                    <td>Description</td>
                    <td>{{ $event->description }}</td>
                  </tr>
                  <tr>
                    <td id="lef">Date</td>
                    <td>{{ $event->event_time->format('d F, Y') }}</td>
                  </tr>
                  <tr>
                    <td id="lef">Time</td>
                  <td>{{ substr($event->event_time->toTimeString(), 0, 5) }}</td>
                  </tr>
                  <tr>
                    <td id="lef">Type</td>
                    <td>{{ $event->event_type }}</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </li>
        </ul>
    

    <div class="divider"></div>

    @if( $event->gmaps_id )
      
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <h5>Where?</h5>
            </div>
            <div class="collapsible-body">
              <div class="gmaps-container">
              <iframe
                width="100%"
                height="100%"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDRAA5yBzOP9W3_GzYxYYlxEnmnjcEbkRM
                  &q=place_id:{{ $event->gmaps_id }}" allowfullscreen>
              </iframe>
              <img class="right" src="/images/powered_by_google_on_white.png" />
              </div>
              <br>
              <br>
            </div>
          </li>
        </ul>
    @endif

    
<!-- ATTENDEES -->

    @if ( count($event->attendees) > 0 )
    <div class="divider"></div>
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <h5>Attendees</h5>
            </div>
            <div class="collapsible-body">
                <section class="flow-text">
                  <p class="flowtext">People attending: ({{count($event->attendees)}})</p>
                      @foreach ( $event->attendees as $attendee )
                      <div class="col s4 m3 l2">
                        <p class="center-align">
                            {{ $attendee->username }}
                        </p>
                      </div>
                      @endforeach
                  </ul>
                </section>
            </div>
          </li>
        </ul>
    @endif

<!-- TAGS -->

    @if( count($event->tags) > 0 )
      <div class="divider"></div>
      <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header">
              <h5>Tags</h5>
            </div>
            <div class="collapsible-body">
              <section>
                <div class="row">
                  @foreach( $event->tags as $tag )
                    <div class="col s4 m3 l2">
                      <p class="center-align">
                        <a href="{{ route('tags.show', $tag) }}">
                          {{$tag->name}}
                        </a>
                      </p>
                    </div>
                  @endforeach
                </div>
              </section>
            </div>
          </li>
        </ul>
      
    @endif


    </section>
  </div>
@endsection

@section('scripts')


<script src="https://checkout.stripe.com/checkout.js"></script>


<script>
  var form = $('#attend');
  var handler = StripeCheckout.configure({
    key: '{{ env("STRIPE_PK") }}',
    image: '/images/logo2.png',
    locale: 'auto',
    token: function(token) {
      $('#token').val(token.id);
      $('#email').val(token.email);

      $('#attend').submit();
    }
  });

  $('#attendButton').on('click', function(e) {
    // Open Checkout with further options
    handler.open({
      name: "Purchase Tickets",
      description: '{{ $event->name }}',
      currency: "eur",
      amount: {{ $event->ticket_price * 100 }}
    });
    e.preventDefault();
  });

  // Close Checkout on page navigation
  $(window).on('popstate', function() {
    handler.close();
  });
</script>

@endsection