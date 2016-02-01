<header class="accent flow-text center-align"> 
  <nav class="navbar hide-on-small-only">
    <a class="left" href="{{ route('users.index') }}">Users</a>
    <a class="right modal-trigger" href="{{ route('events.index') }}">Events</a>
    <a href="{{ url('auth/login') }}">Login</a>
      
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
    }
  ?>
</div>
</header>