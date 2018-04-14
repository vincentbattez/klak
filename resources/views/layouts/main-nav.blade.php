<nav role="navigation" class="main-nav">
    {{-- <ul class="nav container">
      <li class="nav-item logo">
        <a href="{{ url('/items') }}" class="nav-link"> <img src="{{ asset('images/logo.svg') }}" alt="icon de jukesound administration"> </a>
      </li>
      <div class="pull-right">
        <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
          <a class="nav-link" href="{{ url('/items') }}">Liste des ressources</a>
        </li>
        <li class="nav-item {{ Request::segment(1) === 'add' ? 'active' : null }}">
          <a class="nav-link" href="{{ url('/items/create') }}">Ajouter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.jukebox-vintage.fr/wp-admin">Administration Jukesound</a>
        </li>
      </div>
    </ul> --}}

    <ul class="nav">
      @auth
      <li class="nav-item"><a href='/profile/{{Auth::user()->id}}'>{{Auth::user()->name}}</a></li>
      <li class="nav-item"><a href='{{ url('/logout') }}'    class="nav-link"                                                                 >Logout</a></li>
      <li class="nav-item"><a href='{{ url('#') }}'          class="nav-link {{ Request::segment(1) === 'createTeam' ? 'active' : null }}"    >Created team</a></li>
      <li class="nav-item"><a href='{{ url('#') }}'          class="nav-link {{ Request::segment(1) === 'createTask' ? 'active' : null }}"    >Created task</a></li>
      <li class="nav-item"><a href='{{ url('#') }}'          class="nav-link {{ Request::segment(1) === 'createProject' ? 'active' : null }}" >Created project</a></li>
      <li class="nav-item"><a href='{{ url('/dashboard') }}' class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}"     >Dashboard</a></li>
      @endauth
      @guest
      <li class="nav-item"><a href='{{ url('/login') }}'     class="nav-link {{ Request::segment(1) === 'dashboard' ? 'active' : null }}"     >Login</a></li>
      <li class="nav-item"><a href='{{ url('/') }}'          class="nav-link {{ Request::segment(1) === 'Landing' ? 'active' : null }}"       >Homepage</a></li>
      @endguest
    </ul>
  </nav>