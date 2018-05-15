<ul class="main-nav__container">

  <a href='{{ url('/') }}'>
    <img class='main-nav__logo' src="{{ URL::asset('images/logo/logo-klak.svg') }}" alt="">
  </a>

  <h1 class='main-nav__titre'>Klak, tasks manager for team</h1>


  @auth
  <li class="main-nav__item">
    <a href='{{ url('/dashboard') }}' class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
      @icon('icon-dashboard', 'icon-dashboard')
      Dashboard
    </a>
  </li>
  <li class="main-nav__item">
    <a href='{{ url('/projects') }}' class="nav-link {{ Request::segment(1) === 'createProject' ? 'active' : null }}">
      @icon('icon-project', 'icon-project')
      Projects
    </a>
  </li>
  <li class="main-nav__item">
    <a href='{{ url('/teams') }}' class="nav-link {{ Request::segment(1) === 'createTeam' ? 'active' : null }}">
      @icon('icon-team', 'icon-team')
      Teams
    </a>
  </li>
  <li class="main-nav__item">
    <a href='{{ url('/logout') }}'class="nav-link">
      @icon('icon-logout', 'icon-logout')
      Logout
    </a>
  </li>

    <li class="main-nav__item compte">
      <div class='main-nav__compte'>

        @avatar( [
          'type' => 'small',
          'idUser' => Auth::user()->id,
          'name' => Auth::user()->name,
          'surname' => Auth::user()->surname,
          'img' => Auth::user()->imgSmall,
          'isName' => true,
        ])
        @endavatar

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
    <li class="main-nav__item">
      <a href='{{ url('/login') }}' class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
        @icon('icon-lock', 'icon-lock')
        Login
      </a>
    </li>
    <li class="main-nav__item">
      <a href='{{ url('/register') }}' class="nav-link {{ Request::segment(1) === 'register' ? 'active' : null }}">
        @icon('icon-edit', 'icon-edit')
        Register
      </a>
    </li>
    <li class="main-nav__item compte">
        <div class='main-nav__compte'>
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
