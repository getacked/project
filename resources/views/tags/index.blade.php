@extends('master')

@section('content')

  <div>
    <?php

      if( Auth::check() ){
        echo "you're in";
      }else{
        echo "no luck";
      }

    ?>
  </div>

  <div class="tags row">
    <ul>
      @forelse( $tags as $tag )
        <li><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></li>
      @endforeach
    </ul>
  </div>

  <div class="center">
    <a href="{{ route('tags.create') }}">
      <i class="material-icons large">add_to_queue</i>
    </a>
  </div>

@stop