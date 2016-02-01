<!DOCTYPE HTML>
<html>
  <head>
    <title>@yield('title', 'default bitch')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
    <meta property="og:url" content="http://ffffionn.me" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="favicon.png" rel='icon'>
    <!-- <link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}" /> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.css"/>
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    @yield('style')
  </head>


  <!-- START OF WEB PAGE -->
  <body>

    @include('partials.header')

    <main class="flow-text container">
      @yield('content')
    </main>

    @include('partials.footer')


    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <!-- // <script src="/js/materialize.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="/js/init.js"></script>
    @yield('script')
  </body>

</html>