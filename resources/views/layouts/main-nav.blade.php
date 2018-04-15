<ul class="main-nav__container">

  <a href='{{ url('/') }}'>
    <img class='main-nav__logo' src="{{ URL::asset('images/logo/logo-klak.svg') }}" alt="">
  </a>

  <h1 class='main-nav__titre'>Klak, tasks manager for team</h1>
  @auth
    <li class="main-nav__item"><a href='{{ url('/logout') }}'class="nav-link">Logout</a></li>
    <li class="main-nav__item"><a href='{{ url('/dashboard') }}' class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">Dashboard</a></li>
    <li class="main-nav__item"><a href='{{ url('#') }}' class="nav-link {{ Request::segment(1) === 'createTeam' ? 'active' : null }}">team</a></li>
    <li class="main-nav__item"><a href='{{ url('#') }}' class="nav-link {{ Request::segment(1) === 'createProject' ? 'active' : null }}">project</a></li>
    <li class="main-nav__item"><a href='{{ url('#') }}' class="nav-link {{ Request::segment(1) === 'createTask' ? 'active' : null }}">task</a></li>

    <li class="main-nav__item compte">
      <div class='main-nav__compte'>
        @if((Auth::user()->img) == '')
          <img src='{{ URL::asset('images/profils/avatar-default.png') }}' alt='Photo de {{Auth::user()->name}}'/>
        @else
          <img src='{{ URL::asset('images/profils') }}/{{Auth::user()->img}}' alt='Photo de {{Auth::user()->name}}'/>
        @endif
        <a href='/profile/{{Auth::user()->id}}' class="nav-link">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
      </div>
      <div class='main-nav__mentions'>
        Klak by <br>
        <a href='http://jonathanmasson.fr/' target="blank">Jonathan</a>,
        <a href='http://vincentbattez.fr' target="blank">Vincent</a> &
        <a href='http://maximejacquet.fr/' target="blank">Maxime</a>
      </div>
    </li>
  @endauth


  @guest
    <li class="main-nav__item"><a href='{{ url('/login') }}' class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">Login</a></li>
    <li class="main-nav__item"><a href='{{ url('/register') }}' class="nav-link {{ Request::segment(1) === 'register' ? 'active' : null }}">Register</a></li>
    <li class="main-nav__item"><a href='{{ url('/') }}' class="nav-link {{ Request::segment(1) === 'Landing' ? 'active' : null }}">Homepage</a></li>
    <li class="main-nav__item compte">
        <div class='main-nav__compte'>        
          <img src='{{ URL::asset('images/profils/avatar-default.png') }}' alt='Photo de ???'/>
          <a href='/login' class="nav-link">Start session</a>
        </div>
        <div class='main-nav__mentions'>
          Klak by <br>
          <a href='http://jonathanmasson.fr/' target="blank">Jonathan</a>,
          <a href='http://vincentbattez.fr' target="blank">Vincent</a> &
          <a href='http://maximejacquet.fr/' target="blank">Maxime</a>
        </div>
      </li>
  @endguest

</ul>
