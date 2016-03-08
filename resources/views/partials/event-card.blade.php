<div class="col s12 m6 l4">
  <div class="card item">
    <div class="card-image waves-effect waves-block waves-light">
      
      @if($event->photo)   
         <?php
             $photo = $event->photo;
             $path = $photo->fileName . $photo->mime;
         ?>
          <img alt="{{ $event->name }} image" class="activator responsive-img center-block"  src="/images/uploads/{!! $path !!}" />
      @else 
          <img alt="{{ $event->name }} image" class="activator responsive-img center-block" src="/images/default-event.png" />
      @endif
    </div>
    
    <div class="card-content">
    
    <span class="card-title activator grey-text text-darken-4"><span class="truncate">{{ $event->name }}</span><br><small>by {{ $event->host->username }}</small><i class="material-icons right">more_vert</i></span>
      <p><strong>{{ $event->event_time->diffForHumans() }}</strong></p>
      <p id="place-{{ $event->gmaps_id }}"></p>
    </div>
  
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $event->name}}: <br><small>by {{ $event->host->username }}</small><i class="material-icons right">close</i></span>

      <p class="card-address" id="{{ $event->gmaps_id }}"></p>
      <p>{{ $event->description }}</p>

      <br>
      <p><em>{{ $event->event_time->toDayDateTimeString() }}</em></p>

      <small><a href="{{ route('events.show', $event) }}">See More</a></small>
    </div>
  </div>
</div>
