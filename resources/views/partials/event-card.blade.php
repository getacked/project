<div class="card teal col s12 m6 l4">
  <div class="center card-content">
    <h4>{{ $event->event_name }}</h4>  by 
    <h4>{{ $event->host['username'] }}</h4>
    <h5>{{ $event->event_time->diffForHumans() }}</h5>
  </div>
  <div class="card-action">
    <a class="f2 f700" href="{{ route('events.show', $event->id) }}">Go to Event Page</a>
  </div>
</div>