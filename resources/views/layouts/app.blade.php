<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{--  NE PAS INDEXER  --}}
  <meta name="robots" content="noindex, nofollow">

  <title>{{$currentPage['title']}}</title>

  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/> 
</head>

<body class="{{$currentPage['bodyClass']}}">

  <header>
      @include('layouts.main-nav')
      @yield('main-header')
  </header>
  
  <main role="document">
    @yield('content')
  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>

</html>