@extends('base')


@section('title')
  {{ $user->username }}'s Profile
@endsection

@section('content')


  <div class="container">
    <div class="user-splash row">
      <div class="col s12 m4 l6">
        <figure>
          @if($user->photo)   
             <?php
                 $photo = $user->photo;
                 $path = $photo->fileName . $photo->mime;
             ?>
              <img alt="{{ $user->name }} image" class="hoverable responsive-img center-block"  src="/images/uploads/{!! $path !!}" />
          @else 
              <img alt="{{ $user->name }} image" class="hoverable responsive-img center-block" src="/images/default-user.png" />
          @endif
          <small>{{ count($user->subscribers()) }} subscribers</small><br>
          <small>Organised {{ count($user->events()) }} events</small>
        </figure>
      </div>

      <div class="col s12 m8 l6">
        <h2 class="center-align">{{ $user->username }}</h2>
        <p> {{ nl2br(e($user->description)) }} </p>

        @if($user === Auth::user() )
        <a href='{{ route('user.edit', $user) }}'>
          <p class='chip'>Edit event <i class='material-icons'>mode_edit</i></p>
        </a>
        @endif
      </div>
    </div>

    <div class="events row">
      <h3 class="center-align">Upcoming Events</h3>
      @forelse( $user->events()->upcoming()->take(8) as $event )
          @include('partials.event-card', $event)
      @empty
        <p>This host hasn't organised any events yet. </p>
      @endforelse
    </div>

    <div>
      <h4 class="center-align">Subscribers to {{ $user->username }}</h4>
      @forelse( $user->subscribers() as $subber )
        <p> {{ $subber->first_name }}</p>
      @empty
        <p>Nobody is interested in {{ $user->username }}</p>
      @endforelse
    </div>

  </div>

@endsection