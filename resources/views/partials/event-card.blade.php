<div class="card teal">
  <div class="center card-content">
    <h4>{{ $event->name }}</h4>  by 
    <h4>{{ $event->host['username'] }}</h4>
    <h5>{{ $event->event_time->diffForHumans() }}</h5>
  </div>
  <div class="card-action">
    <a class="f2 f700" href="{{ route('events.show', $event->id) }}">Go to Event Page</a>
  </div>
</div>