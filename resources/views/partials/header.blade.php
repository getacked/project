<header class="accent flow-text center-align"> 
  <nav class="navbar row hide-on-small-only">
    <a class="col s2" href="{{ route('users.index') }}">Users</a>
    <a class="col s2" href="{{ route('events.index') }}">Events</a>
    <a class="col s2" href="{{ route('organisers.index') }}">Organisers</a>
    <a class="col s2" href="{{ route('tags.index') }}">Tags</a>
  </nav>  
<div>
  <?php

    if(Auth::check()){
      echo "<a href='" . route('logout') . "' class='btn'>Logout</a>";
    }else{
      echo "<a href='" . route('loginTest')  . "' class='btn'>Login Test</a>";
    }

  ?>
</div>

<div class="right yellow-text">
  <?php
    if(Auth::check()){
      echo "You're logged in as " . Auth::user()->name ;
      // dd(Auth::user());
    }
  ?>
</div>
</header>