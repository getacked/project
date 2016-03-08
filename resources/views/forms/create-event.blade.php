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

      <input type="hidden" name="place_name" id="place_name"/>
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