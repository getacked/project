<div class="card col s12 m6 l4">
  <div class="center card-content">
    <h4>{{ $event->event_name }}</h4>  by 
    <h4>{{ $event->user['name'] }}</h4>
    <h5>{{ $event->event_time->diffForHumans() }}</h5>
  </div>
  <div class="card-action">
    <a class="f2 f700" href="../events/{{ $event->id }}">Go to Event Page</a>
  </div>
</div>