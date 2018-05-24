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

<body class="body-{{$currentPage['bodyClass']}}" pjax-container-body>

  <nav role="navigation" class="main-nav">
    @include('layouts.main-nav')
  </nav>

  <div pjax-container-main>
    @include('components/alerts')
    <main role="document" class="{{$currentPage['bodyClass']}}">
      @yield('content')
    </main>
    <footer class="main-footer">
      <span>Klak created by </span>
      <a href='http://vincentbattez.fr' target="blank">Vincent Battez</a>,
      <a href='http://maximejacquet.fr/' target="blank">Maxime Jacquet</a> and
      <a href='http://jonathanmasson.fr/' target="blank">Jonathan Masson</a>
      <img class='logo' src="{{ URL::asset('images/logo/logo-klak-grey.svg') }}" alt="Klak logo's grey">
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>

</html>