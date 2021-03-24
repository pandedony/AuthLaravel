<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('grupi/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('grupi/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('grupi/fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">


    
    <title>@yield('title')</title>
  </head>
  <body>


  @yield('container')


  <script src="{{ asset('grupi/js/jquery.js') }}"></script>
  <script src="{{ asset('grupi/js/main.js') }}"></script>
  <script src="{{ asset('grupi/js/bootstrap.min.js') }}"></script>
  
  </body>
</html>