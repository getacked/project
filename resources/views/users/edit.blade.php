@extends('base')

@section('content')
<div class="container">

  {{ Form::open(array('route' => array('user.update', Auth::user()), 'method' => 'PUT', 'enctype' => 'multipart/form-data') ) }}
    <div class="file-field input-field">
      <div class="btn">
        <span>Photo</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    {{ Form::submit('UPLOAD', ['class' => 'btn']) }}
  {{ Form::close() }}


  @if(Auth::user()->photo)   
      <?php
          $photo = Auth::user()->photo;
          $path = $photo->fileName . $photo->mime;
      ?>
      
       <img alt="{{ Auth::user()->username }} image" class="responsive-img center-block"  src="/images/{!! $path !!}" />
  @else 
      <img alt="{{ Auth::user()->username }} image" class="responsive-img center-block" src="http://lorempixel.com/850/480" />
  @endif

</div>

@endsection