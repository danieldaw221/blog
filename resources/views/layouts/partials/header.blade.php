<header class="mb-0">
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" width="30%" class="rounded mx-auto d-block" alt="imagen logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{route('empleados.index')}}" class="{{request()->routeIs('empleados.*') ? 'active' : ''}}">Empleados</a>
        </li>
        <li class="nav-item">
          <a href="{{route('nosotros')}}" class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a>
        </li>
      </ul>
    </div>
  </nav>
</header>