<!DOCTYPE html>
<html type="en">
  <head>
    @yield('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
    <meta name="keywords" content="Events, Eventure, Organization, venues, organizers">
    <meta name="description" content="Event Organization Application.">
    <meta name="author" content="Jack, Scott, Fionn, Alex, Ciaran, Jake">

    <title>@yield('title', 'Eventure')</title>

    <!--Links for Icons-->
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Stylesheets  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/video.css') }}">

    @yield('styles')
  </head>

  <body>

    @yield('pre-nav')
    @include('partials.header')
    
    <main id="main">
      @yield('content')
    </main>
    
   @include('partials.footer')

   <!--jQuery and Materialize -->
   <script src="/js/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
   <script src="/js/jquery.matchHeight.js"></script>
   <script src="/js/typeahead.js"></script>
   <script src="/js/init.js"></script>

   @yield('scripts')
  </body>
</html>