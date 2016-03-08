@extends('base')

@section('styles')
<style>
  body
  {
    background-image: url( {{ public_path() . '/images/sunset.jpg' }} )
  }
  footer
  {
    margin-top: 0px !important;
  }
</style>


@endsection

@section('content')

<div class="container white-text" id="logoutimage">
  <div class="valign-wrapper">
       <!--data will have to be pulled here to supply a name for the h1-->
    <h1 class="valign center-block">Goodbye {{ session('message') }}</h1>
  </div>

  <p class="center-align">We look forward to seeing you again for your next Eventure.</p>
</div>

@endsection