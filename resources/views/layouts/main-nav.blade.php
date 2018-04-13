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

    <ul>
      <li><a href='/login'>Login</a></li>
      <li><a href='/logout'>Logout</a></li>
      <li><a href='/'>Landing</a></li>
      <li><a href='/dashboard'>Dashboard</a></li>
      <li><a href='#'>Created team</a></li>
      <li><a href='#'>Created project</a></li>
      <li><a href='#'>Created task</a></li>
    </ul>
</nav>