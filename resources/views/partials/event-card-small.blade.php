<div class="col s12 m4 l3">
  <div class="card item hoverable">
    <div class="card-image waves-effect waves-block waves-light">
      
      @if($event->photo)   
         <?php
             $photo = $event->photo;
             $path = $photo->fileName . $photo->mime;
         ?>
          <img alt="{{ $event->name }} image" class="activator responsive-img center-block"  src="/images/uploads/{!! $path !!}" width="320" height="250" />
      @else 
          <img alt="{{ $event->name }} image" class="activator responsive-img center-block" src="http://lorempixel.com/850/480"  width="320" height="250"/>
      @endif
    </div>
    
    <div class="card-content">
    
    <span class="card-title activator truncate">{{ $event->name }}<i class="material-icons right">more_vert</i></span>
      <p><b>{{ $event->event_time->diffForHumans() }}</b></p>
      <p>{{ $event->event_time->toDayDateTimeString() }}</p>
    </div>
  
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $event->name}}: <br><small>by {{ $event->host->username }}</small><i class="material-icons right">close</i></span>

      <p class="card-address" id="{{ $event->gmaps_id }}"></p>
      <p>{{ $event->description }}</p>

      <small><a href="{{ route('events.show', $event) }}">See More</a></small>
    </div>
  </div>
</div>