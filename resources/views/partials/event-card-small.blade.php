<div class="col s6 m4 l3">
  <div class="card">

    <!-- Grab a default picture  -->

    <div class="card-image waves-effect waves-block waves-light">
      @if($event->image)   
        <?php
            $path = App\Image::find($image)->fileName;
        ?>
         <img class="activator" src="/images/{{ $path }}" />
      @else 
          <!-- <img class="activator" src="images/default.jpg" /> -->
          <img class="activator" src="http://lorempixel.com/840/500" />
      @endif
    </div>

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4 truncate">{{ $event->name }}</span>
      <p>{{ $event->event_time->diffForHumans() }}</p>
    </div>


    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{ $event->name }}<i class="material-icons right">close</i></span>
      <small>at {{$event->location }}</small>
      <p>
        {{ $event->description }}
      </p>
      <a href="{{ route('events.show', $event) }}">See More</a>
    </div>

  </div>
</div>