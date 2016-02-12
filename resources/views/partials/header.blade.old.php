<header class="accent flow-text center-align"> 
  <nav class="navbar row">
    <a class="col s2" href="{{ route('users.index') }}">Users</a>
    <a class="col s2" href="{{ route('events.index') }}">Events</a>
    <a class="col s2" href="{{ route('tags.index') }}">Tags</a>
    @if(Auth::check())
    <a class="col s2" href="{{ action('TestController@getSubscriptions') }}">Subs</a>
    @endif
  </nav>  
<div>
  <?php

    if(Auth::check() ){
      echo "<a href='" . route('testOut') . "' class='btn'>Logout</a>";
    }else{
      echo "<a href='" . url('/login')  . "' class='btn'>Login</a>";
      echo "<a href='" . url('/register')  . "' class='btn'>Register</a>";
    }

  ?>
</div>

<div class="right yellow-text">
  <?php
    if(Auth::check()){
      echo "Welcome back " . Auth::user()->username ;
      echo '<a href="'.route('events.create').'">
        <i class="material-icons small">add_to_queue</i>
      </a>';
    }
  ?>
</div>
</header>