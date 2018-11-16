<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="page" id="app">
    <div class="page-main">
      @include('layouts.header')
      @include('layouts.navbar')

      <div class="my-3 my-md-5">
        <div class="container">
          @include('flash::message')
          @yield('content')
        </div>
      </div>
    </div>
    @include('layouts.footer')
  </div>

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/datamaps/0.5.9/datamaps.usa.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  @yield('scripts')
</body>
</html>
